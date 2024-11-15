<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CouponRequest;
use App\Models\Carts;
use App\Models\CouponRedemption;
use Session;

class CouponController extends Controller
{
    public function applyCoupon_bk(CouponRequest $request){
        // Check if userId is set in session
        if (Session::has('loginData.userId')) {
            $userId = Session::get('loginData.userId');
            $MerchantID = Session::get('loginData.MerchantID');
            $dataToSend = [
                'userReference' => $userId,
                'id' => ''
            ];

            $cart_data = Carts::with('product')->where('user_id', $MerchantID)->first();

            if(!empty($cart_data) && !empty($cart_data->product)){

                $retrieveApiResponse = $this->curlRequest(env('PAYMENT_RETRIEVE_URL'), 'POST', $dataToSend);

                if (!empty($retrieveApiResponse)) {
                    $retrieveResponse = json_decode($retrieveApiResponse);

                    if($retrieveResponse->responseCode==0){
                        if (!empty($retrieveResponse->data)) {
                            $dataToSend = [
                                'userReference' => $userId,
                                'RetrievalReference' => $retrieveResponse->data->retrievalReferenceNumber,
                                'MerchantID' => $retrieveResponse->data->cardAcceptorIdCode,
                                'TerminalID' => $retrieveResponse->data->cardAcceptorTerminalId,
                                'AccountType' => '00',
                                'VoucherNumber' => $request->coupon,
                                'CurrencyCode' => 710,
                            ];

                            $addApiResponse = $this->curlRequest(env('PAYMENT_Add_URL'), 'POST', $dataToSend);

                            if (!empty($addApiResponse)) {

                                $addResponse = json_decode($addApiResponse);
                                        
                                if($addResponse->responseCode==0){
                                    if (!empty($addResponse->data)) {
                                        Session::put('coupon', $request->coupon);

                                        $input = [ 
                                            'MerchantID' => $MerchantID,
                                            'product_id' => $cart_data->product->id,
                                            'product_name' => $cart_data->product->name,
                                            'product_price' => $cart_data->product->price,
                                            'nappy_code' => $cart_data->product->nappy_code,
                                            'coupon_code' => $request->coupon,
                                        ];
                                        CouponRedemption::create($input);

                                        Carts::where('user_id', 'MerchantID')->delete();

                                        return response()->json(['type' => 'success', 'message' => $addResponse->data], 200);
                                    }   
                                } else {
                                    $response = [
                                        'message' => $addResponse->errorMessage,
                                        'errors' => [
                                            'coupon' => [
                                                $addResponse->errorMessage
                                            ]
                                        ]
                                    ];
                                    return response()->json($response, 500);
                                }
                            }
                        }
                    } else {
                        $response = [
                            'message' => $retrieveResponse->errorMessage,
                            'errors' => [
                                'coupon' => [
                                    $retrieveResponse->errorMessage
                                ]
                            ]
                        ];
                        return response()->json($response, 500);
                    }
                } else {
                    $response = [
                        'message' => $retrieveResponse->errorMessage,
                        'errors' => [
                            'coupon' => [
                                $retrieveResponse->errorMessage
                            ]
                        ]
                    ];
                    return response()->json($response, 500);
                }
            } else {
                $response = [
                    'message' => 'Something went wrong. please try again.',
                    'errors' => [
                        'coupon' => [
                            'Something went wrong. please try again.'
                        ]
                    ]
                ];
                return response()->json($response, 500);
            }
        } else {
            // Handle case where userId is not set in session
            return response()->json(['errors' => 'User session data not found.'], 403);
        }

        return DataTables::of($items)->addIndexColumn()->make(true);
    }

    public function applyCoupon(CouponRequest $request)
    {
        // Check if userId is set in session
        if (!Session::has('loginData.userId')) {
            return response()->json(['errors' => 'User session data not found.'], 403);
        }

        $userId = Session::get('loginData.userId');
        $MerchantID = Session::get('loginData.MerchantID');

        // Retrieve cart data for the user
        $cartData = Carts::with('product')->where('user_id', $MerchantID)->first();

        if (empty($cartData) || empty($cartData->product)) {
            return response()->json(['type' => 'error', 'message' => 'Cart or product data not found.'], 200);
        }

        // Retrieve payment details
        $dataToSend = [
            'userReference' => $userId,
            'id' => ''
        ];
        
        $retrieveApiResponse = $this->curlRequest(env('PAYMENT_RETRIEVE_URL'), 'POST', $dataToSend);
        if (!$retrieveApiResponse) {
            return response()->json(['type' => 'error', 'message' => 'Error retrieving payment data.'], 200);
        }

        $retrieveResponse = json_decode($retrieveApiResponse);
        if ($retrieveResponse->responseCode != 0 || empty($retrieveResponse->data)) {
            return response()->json(['type' => 'error', 'message' => $retrieveResponse->errorMessage ?? 'Unknown error.'], 200);
        }

        // Retrieve vocuher details
        return $dataToSendR = [
            'userReference' => $userId,
            'MerchantID' => $retrieveResponse->data->cardAcceptorIdCode,
            'TerminalID' => $retrieveResponse->data->cardAcceptorTerminalId,
            'RetrievalReference' => $retrieveResponse->data->retrievalReferenceNumber,
            'VoucherNumber' => $request->coupon,
        ];

        $retrieveApiResponseR = $this->curlRequest(env('RETRIEVE_VOUCHER_Add_URL'), 'POST', $dataToSendR);
        if (!$retrieveApiResponseR) {
            return response()->json(['type' => 'error', 'message' => 'Error retrieving voucher data.'], 200);
        }

        $retrieveResponseR = json_decode($retrieveApiResponseR);
        if ($retrieveResponseR->responseCode != 0 || empty($retrieveResponseR->data)) {
            return response()->json(['type' => 'error', 'message' => $retrieveResponseR->errorMessage ?? 'Unknown error.'], 200);
        }

        return $retrieveResponseR = json_decode($retrieveApiResponseR, true);

        $accountType = isset($response['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['accountType']) ? $response['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['accountType'] : '00';
        $currencyCode = isset($response['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['currencyCode']) ? $response['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['currencyCode'] : 710;
        $notificationType = isset($retrieveResponseR['result']['additionalData']['NOTIFY']['notificationType']) ? $retrieveResponseR['result']['additionalData']['NOTIFY']['notificationType'] : 'MAIL';
        $notificationAddress = isset($retrieveResponseR['result']['additionalData']['NOTIFY']['notificationAddress']) ? $retrieveResponseR['result']['additionalData']['NOTIFY']['notificationAddress'] : '';

        $medicalKey = '';
        $medicalValue = '';

        if(isset($retrieveResponseR['result']['additionalData']['undefined'])){
            $additionalDataValues = $retrieveResponseR['result']['additionalData']['undefined'];
            $medicalKey = $additionalDataValues[1];
            $medicalValue = $additionalDataValues[2];
        }

        return $dataToSend = [
            'userReference' => $userId,
            'RetrievalReference' => $retrieveResponse->data->retrievalReferenceNumber,
            'MerchantID' => $retrieveResponse->data->cardAcceptorIdCode,
            'TerminalID' => isset($retrieveResponse->data->cardAcceptorTerminalId) ? $retrieveResponse->data->cardAcceptorTerminalId : '',
            'TransactionType' => '00',
            'AccountType' => $accountType,
            'VoucherNumber' => $request->coupon,
            'CurrencyCode' => $currencyCode,
            'VoucherVerificationCode' => 8505,
            'TransactionAmount' => ($request->grandtotal*100),
            'NotificationType' => ($notificationType=='SMS') ? '01' : '03',
            'NotificationAddress' => $notificationAddress,
            'AdditionalData' => $medicalKey.":".$medicalValue
        ];


        // Add coupon
        $addApiResponse = $this->curlRequest(env('PAYMENT_Add_URL'), 'POST', $dataToSend);
        if (!$addApiResponse) {
            return response()->json(['type' => 'error', 'message' => 'Error adding voucher'], 200);
        }

        $addResponse = json_decode($addApiResponse);
        if ($addResponse->responseCode != 0 || empty($addResponse->data)) {
            return response()->json(['type' => 'error', 'message' => $addResponse->errorMessage ?? 'Unknown error.'], 200);
        }

        $input = [
            'MerchantID' => $MerchantID,
            'product_id' => $cartData->product->id,
            'product_name' => $cartData->product->name,
            'product_price' => $cartData->product->price,
            'nappy_code' => $cartData->product->nappy_code,
            'coupon_code' => $request->coupon,
        ];
        CouponRedemption::create($input);

        // Remove cart for the user
        Carts::where('user_id', $MerchantID)->delete();

        return response()->json(['type' => 'success', 'message' => 'Approved and Completed Successfully'], 200);
    }
}