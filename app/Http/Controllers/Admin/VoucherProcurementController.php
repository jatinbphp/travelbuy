<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherProcurement;
use Illuminate\Support\Facades\Session;

class VoucherProcurementController extends Controller
{
    public function create(){
        $data['menu'] = "Voucher Procurement";
        return view('admin.voucher-procurement.create',$data);
    }

    public function addNewdiv(Request $request){   
        if ($request->ajax()) {
            $data = $request->all();
            return view('admin.voucher-procurement.new-div', $data);
        }
    }

    public function store(Request $request){    

        $request->validate([
            'batchIdentifier.*' => 'required',
            'rrn.*' => 'required',
            'merchantID.*' => 'required',
            'cardNumber.*' => 'required',
            'pluCode.*' => 'required',
            'quantity.*' => 'required',
            'voucherAmount.*' => 'required',
            'notificationMethod.*' => 'required',
            'notificationAddress.*' => 'required',
            'additionalData.*' => 'required',
        ], [
            'batchIdentifier.*.required' => 'Batch Identifier is required.',
            'rrn.*.required' => 'RRN is required.',
            'merchantID.*.required' => 'Merchant ID is required.',
            'cardNumber.*.required' => 'Card Number is required.',
            'pluCode.*.required' => 'PLU Code is required.',
            'quantity.*.required' => 'Quantity is required.',
            'voucherAmount.*.required' => 'Voucher Amount is required.',
            'notificationMethod.*.required' => 'Notification Method is required.',
            'notificationAddress.*.required' => 'Notification Address is required.',
            'additionalData.*.required' => 'Additional Data is required.',
        ]);


        $input = $request->except(['_token', 'redirects_to']);
        $input['form_data'] = json_encode($input);
        $input['user_id'] = Session::get('loginData')['MerchantID'];

        // Generate CSV file
        $csvFileName = 'csvFile-'.now()->format('Ymd_His').'-'.Session::get('loginData')['MerchantID'].'.csv';
        $csvFilePath = public_path('uploads/csvFile/' . $csvFileName);

        $csvFile = fopen($csvFilePath, 'w');

        // Header
        fputcsv($csvFile, [
            'Batch Identifier',
            'RRN',
            'Merchant ID',
            'Card Number',
            'PLU Code',
            'Quantity',
            'Voucher Amount',
            'Notification Method',
            'Notification Address',
            'Additional Data'
        ]);

        // Data
        $batchIdentifiers = $request->input('batchIdentifier');
        $rrns = $request->input('rrn');
        $merchantIDs = $request->input('merchantID');
        $cardNumbers = $request->input('cardNumber');
        $pluCodes = $request->input('pluCode');
        $quantities = $request->input('quantity');
        $voucherAmounts = $request->input('voucherAmount');
        $notificationMethods = $request->input('notificationMethod');
        $notificationAddresses = $request->input('notificationAddress');
        $additionalData = $request->input('additionalData');

        foreach ($batchIdentifiers as $index => $batchIdentifier) {
            fputcsv($csvFile, [
                $batchIdentifier,
                $rrns[$index] ?? '',
                $merchantIDs[$index] ?? '',
                $cardNumbers[$index] ?? '',
                $pluCodes[$index] ?? '',
                $quantities[$index] ?? '',
                $voucherAmounts[$index] ?? '',
                $notificationMethods[$index] ?? '',
                $notificationAddresses[$index] ?? '',
                $additionalData[$index] ?? ''
            ]);
        }

        fclose($csvFile);
        VoucherProcurement::create($input);

        // Flash success message and redirect
        \Session::flash('success', 'Your data has been uploaded successfully!');
        return redirect()->route('voucher-procurement.create');
    }
}
