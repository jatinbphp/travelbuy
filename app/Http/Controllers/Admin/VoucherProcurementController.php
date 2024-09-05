<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherProcurement;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Rules\CommaSeparatedEmails;

class VoucherProcurementController extends Controller
{
    public function create(){
        $data['menu'] = "Voucher Procurement";
        $data['productData'] = Products::select('name', 'nappy_code')->where('status','active')->first();
        return view('admin.voucher-procurement.create',$data);
    }

    public function addNewdiv(Request $request){   
        if ($request->ajax()) {
            $data = $request->all();
            $data['productData'] = Products::select('name', 'nappy_code')->where('status','active')->first();
            return view('admin.voucher-procurement.new-div', $data);
        }
    }

    public function store(Request $request){    

        $request->validate([
            'merchantID.*' => 'required',
            'pluCode.*' => 'required',
            'quantity.*' => 'required',
            'voucherAmount.*' => 'required',
            'notificationMethod.*' => 'required',
            'notificationAddress.*' => ['required', new CommaSeparatedEmails],
            'additionalData.*.patient_name' => 'required|max:255',
            'additionalData.*.patient_surname' => 'required|max:255',
            'additionalData.*.patient_id_number' => 'required|numeric|digits:13',
            'additionalData.*.ICD10' => 'required',
            'additionalData.*.CPT4' => 'required',
            'additionalData.*.molecule' => 'required',
            'additionalData.*.nappi_code' => 'required',
            'additionalData.*.patient_delivery_address' => 'required',
        ], [
            'merchantID.*.required' => 'Merchant ID is required.',
            'pluCode.*.required' => 'PLU Code is required.',
            'quantity.*.required' => 'Quantity is required.',
            'voucherAmount.*.required' => 'Voucher Amount is required.',
            'notificationMethod.*.required' => 'Notification Method is required.',
            'notificationAddress.*.required' => 'Email Address is required.',
            'additionalData.*.patient_name.required' => 'The patient name is required.',
            'additionalData.*.patient_name.max' => 'The patient name may not be greater than 255 characters.',
            'additionalData.*.patient_surname.required' => 'The patient surname is required.',
            'additionalData.*.patient_surname.max' => 'The patient surname may not be greater than 255 characters.',
            'additionalData.*.patient_id_number.required' => 'The patient ID is required.',
            'additionalData.*.patient_id_number.numeric' => 'The patient ID must be a valid number.',
            'additionalData.*.patient_id_number.digits' => 'The patient ID must be exactly 13 digits.',
            'additionalData.*.ICD10.required' => 'The ICD10 code is required.',
            'additionalData.*.CPT4.required' => 'The CPT4 code is required.',
            'additionalData.*.molecule.required' => 'The molecule name is required.',            
            'additionalData.*.nappi_code.required' => 'The nappi code is required.',
            'additionalData.*.patient_delivery_address.required' => 'The patient delivery address is required.',
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
            'PLU Code',
            'Quantity',
            'Voucher Amount',
            'Notification Method',
            'Notification Address',
            'Additional Data'
        ]);

        // Data
        $merchantIDs = $request->input('merchantId');
        $pluCodes = $request->input('pluCode');
        $quantities = $request->input('quantity');
        $voucherAmounts = $request->input('voucherAmount');
        $notificationMethods = $request->input('notificationMethod');
        $notificationAddresses = $request->input('notificationAddress');
        $additionalData = $request->input('additionalData');

        foreach ($merchantIDs as $index => $merchantID) {

            if (isset($additionalData[$index])) {
                $additionalDataString = '';
                foreach ($additionalData[$index] as $key => $value) {
                    $additionalDataString .= ucwords(str_replace("_"," ",$key)) . ': ' . $value . '; ';
                }
                // Remove the trailing semicolon and space
                $additionalDataString = rtrim($additionalDataString, '; ');
            } else {
                $additionalDataString = '';
            }

            fputcsv($csvFile, [
                'BATCH-'.strtoupper(Str::random(5)),
                strtoupper(Str::random(12)),
                $merchantID ?? '',
                $pluCodes[$index] ?? '',
                $quantities[$index] ?? '',
                $voucherAmounts[$index] ?? '',
                $notificationMethods[$index] ?? '',
                $notificationAddresses[$index] ?? '',
                $additionalDataString ?? ''
            ]);
        }

        fclose($csvFile);
        VoucherProcurement::create($input);

        $this->uploadFileToFtpServer($csvFilePath);

        // Flash success message and redirect
        \Session::flash('success', 'Your data has been uploaded successfully!');
        return redirect()->route('voucher-procurement.create');
    }

    public function uploadFileToFtpServer($filePath){
        $remoteFilePath = env('TRADEROOT_PATH') . basename($filePath);

        // Establish connection
        $connection = ssh2_connect(env('TRADEROOT_HOST'), env('TRADEROOT_PORT'));
        if (!$connection) {
            die('Connection failed');
        }

        // Authenticate
        if (!ssh2_auth_password($connection, env('TRADEROOT_USER'), env('TRADEROOT_PASS'))) {
            die('Authentication failed');
        }

        // Initialize SFTP session
        $sftp = ssh2_sftp($connection);
        if (!$sftp) {
            die('SFTP session initialization failed');
        }

        // Upload the file
        $stream = fopen("ssh2.sftp://$sftp$remoteFilePath", 'w');
        if (!$stream) {
            die('Could not open file for writing');
        }

        $data_to_send = file_get_contents($filePath);
        if ($data_to_send === false) {
            die('Could not read local file');
        }

        if (fwrite($stream, $data_to_send) === false) {
            die('Could not send data from file');
        }

        fclose($stream);
    }
}
