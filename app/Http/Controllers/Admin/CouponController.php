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
        /*$dataToSendVoucher = [
            'userReference' => $userId,
            'id' => Session::get('loginData')['name']
        ];

        $retrieveApiResponseVoucher = $this->curlRequest(env('RETRIEVE_VOUCHER_URL'), 'POST', $dataToSendVoucher);
        if (!$retrieveApiResponseVoucher) {
            return response()->json(['type' => 'error', 'message' => 'Error retrieving vocuher data.'], 200);
        }

        $retrieveResponseVoucher = json_decode($retrieveApiResponseVoucher);
        if ($retrieveResponseVoucher->responseCode != 0 || empty($retrieveResponseVoucher->data)) {
            return response()->json(['type' => 'error', 'message' => $retrieveResponseVoucher->errorMessage ?? 'Unknown error.'], 200);
        }*/


        // Retrieve vocuher Add
        $dataToSendR = [
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

        // Add coupon
        $retrieveResponseR = json_decode($retrieveApiResponseR, true);

        $accountType = isset($retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['accountType']) ? $retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['accountType'] : '00';
        $TransactionAmount = isset($retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['amount']) ? $retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['amount'] : 0;
        $currencyCode = isset($retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['currencyCode']) ? $retrieveResponseR['result']['additionalData']['ADAMTS']['additionalAmountItems']['additionalAmountItem'][0]['currencyCode'] : 710;
        $notificationType = isset($retrieveResponseR['result']['additionalData']['NOTIFY']['notificationType']) ? $retrieveResponseR['result']['additionalData']['NOTIFY']['notificationType'] : 'MAIL';
        $notificationAddress = isset($retrieveResponseR['result']['additionalData']['NOTIFY']['notificationAddress']) ? $retrieveResponseR['result']['additionalData']['NOTIFY']['notificationAddress'] : '';

        $medicalKey = '';
        $medicalValue = '';

        if(isset($retrieveResponseR['result']['additionalData']['undefined'])){
            $additionalDataValues = $retrieveResponseR['result']['additionalData']['undefined'];
            $medicalKey = $additionalDataValues[1];
            $medicalValue = $additionalDataValues[2];
        }

        $dataToSendP = [
            'userReference' => $userId,
            'RetrievalReference' => $retrieveResponse->data->retrievalReferenceNumber,
            'MerchantID' => $retrieveResponse->data->cardAcceptorIdCode,
            'TerminalID' => $retrieveResponse->data->cardAcceptorTerminalId,
            'TransactionType' => '00',
            'AccountType' => $accountType,
            'VoucherNumber' => $request->coupon,
            'CurrencyCode' => $currencyCode,
            'VoucherVerificationCode' => $request->verification_code,
            'TransactionAmount' => ($request->grandtotal*100),
            'NotificationType' => ($notificationType=='SMS') ? '01' : '03',
            'NotificationAddress' => $notificationAddress,
            'AdditionalData' => $medicalKey.":".$medicalValue
        ];

        $addApiResponse = $this->curlRequest(env('PAYMENT_Add_URL'), 'POST', $dataToSendP);
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

        // for display
        $additionalData = $dataToSendP['AdditionalData'] ?? '';
        $mainArray = [];

        if (!empty($additionalData)) {
            $mainParts = explode(':', $additionalData);

            if (isset($mainParts[1])) {
                $secondaryParts = explode(';', $mainParts[1]);

                foreach ($secondaryParts as $part) {
                    $tertiaryParts = explode(',', $part);

                    foreach ($tertiaryParts as $innerPart) {
                        $pipeParts = strpos($innerPart, '|') !== false 
                            ? explode('|', $innerPart) 
                            : [$innerPart];
                        
                        $mainArray = array_merge($mainArray, $pipeParts);
                    }
                }
            }
        }
        
        $returnData = [            
            'Merchant_ID' => $retrieveResponse->data->cardAcceptorIdCode ?? null,
            'PLU_Code' => '2/hv/hvoucher',
            'Quantity' => 1,
            'Voucher_Amount' => isset($request->grandtotal) ? ($request->grandtotal * 100) : null,
            'Notification_Method' => $notificationType ?? null,
            'Email_Address_/_Phone Number' => $notificationAddress ?? null,
            'Molecule' => isset($mainArray[7]) && !empty($mainArray[7]) ? $mainArray[7] : null,
            'Nappi_Code' => isset($mainArray[8]) && !empty($mainArray[8]) ? $mainArray[8] : null,
            'Dosage' => isset($mainArray[9]) && !empty($mainArray[9]) ? $mainArray[9] : null,
            'Patient_Name' => isset($mainArray[0]) && !empty($mainArray[0]) ? $mainArray[0] : null,
            'Patient_Surname' => isset($mainArray[1]) && !empty($mainArray[1]) ? $mainArray[1] : null,
            'Patient_ID' => isset($mainArray[2]) && !empty($mainArray[2]) ? $mainArray[2] : null,
            'Patient_Medical_Scheme_Name' => isset($mainArray[3]) && !empty($mainArray[3]) ? $mainArray[3] : null,
            'Patient_Medical_Scheme_Membership_Number' => isset($mainArray[4]) && !empty($mainArray[4]) ? $mainArray[4] : null,
            'Pharmacy_Name' => isset($mainArray[17]) && !empty($mainArray[17]) ? $mainArray[17] : null,
            'ICD10' => isset($mainArray[5]) && !empty($mainArray[5]) ? $mainArray[5] : null,
            'CPT4' => isset($mainArray[6]) && !empty($mainArray[6]) ? $mainArray[6] : null,
            'Address_1' => isset($mainArray[10]) && !empty($mainArray[10]) ? $mainArray[10] : null,
            'Address_2' => isset($mainArray[11]) && !empty($mainArray[11]) ? $mainArray[11] : null,
            'Suburb' => isset($mainArray[12]) && !empty($mainArray[12]) ? $mainArray[12] : null,
            'City' => isset($mainArray[13]) && !empty($mainArray[13]) ? $mainArray[13] : null,
            'Region' => isset($mainArray[14]) && !empty($mainArray[14]) ? $mainArray[14] : null,
            'Country_Code' => isset($mainArray[15]) && !empty($mainArray[15]) ? $mainArray[15] : null,
            'Postal_Code' => isset($mainArray[16]) && !empty($mainArray[16]) ? $mainArray[16] : null,
        ];

        return response()->json(['type' => 'success', 'message' => 'Approved and Completed Successfully', 'data' => $returnData], 200);
    }
}
