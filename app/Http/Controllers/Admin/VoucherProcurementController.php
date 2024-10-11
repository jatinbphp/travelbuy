<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoucherProcurement;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Rules\CommaSeparatedEmails;
use App\Rules\CommaSeparatedPhoneNumbers;

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
            'notificationAddress.*' => [
                'required',
                function($attribute, $value, $fail) use ($request) {
                    $index = explode('.', $attribute)[1]; // Get the index of the current item
                    $method = $request->input("notificationMethod.$index");

                    if ($method == '01') {
                        return (new CommaSeparatedEmails)->passes($attribute, $value) ?: $fail('Invalid email addresses.');
                    } elseif ($method == '02') {
                        return (new CommaSeparatedPhoneNumbers)->passes($attribute, $value) ?: $fail('Invalid phone numbers.');
                    }
                }
            ],
            'additionalData.*.dosage' => 'required',
            'additionalData.*.patient_name' => 'required|max:255',
            'additionalData.*.patient_surname' => 'required|max:255',
            'additionalData.*.patient_id_number' => 'required|numeric|digits:13',
            'additionalData.*.ICD10' => 'required',
            'additionalData.*.CPT4' => 'required',
            'additionalData.*.molecule' => 'required',
            'additionalData.*.nappi_code' => 'required',
            'additionalData.*.patient_medical_scheme_name' => 'required',
            'additionalData.*.patient_medical_scheme' => 'required',
            'additionalData.*.pharmacy_name' => 'required',
            'additionalData.*.address_1' => 'required',
            'additionalData.*.address_2' => 'required',
            'additionalData.*.suburb' => 'required',
            'additionalData.*.city' => 'required',
            'additionalData.*.region' => 'required',
            'additionalData.*.country_code' => 'required',
            'additionalData.*.postal_code' => 'required',
        ], [
            'merchantID.*.required' => 'Merchant ID is required.',
            'pluCode.*.required' => 'PLU Code is required.',
            'quantity.*.required' => 'Quantity is required.',
            'voucherAmount.*.required' => 'Voucher Amount is required.',
            'notificationMethod.*.required' => 'Notification Method is required.',
            'notificationAddress.*.required' => 'Email Address / Phone Number is required.',
            'additionalData.*.dosage.required' => 'The dosage is required.',
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
            'additionalData.*.patient_medical_scheme_name.required' => 'The patient medical scheme name is required.',
            'additionalData.*.patient_medical_scheme.required' => 'The patient medical scheme membership number is required.',
            'additionalData.*.pharmacy_name.required' => 'The pharmacy name (service point) is required.',
            'additionalData.*.address_1.required' => 'The address 1 is required.',
            'additionalData.*.address_2.required' => 'The address 2 is required.',
            'additionalData.*.suburb.required' => 'The suburb is required.',
            'additionalData.*.city.required' => 'The city is required.',
            'additionalData.*.region.required' => 'The region is required.',
            'additionalData.*.country_code.required' => 'The country code is required.',
            'additionalData.*.postal_code.required' => 'The postal code is required.',
        ]);


        $input = $request->except(['_token', 'redirects_to']);
        $input['form_data'] = json_encode($input);
        $input['user_id'] = Session::get('loginData')['MerchantID'];

        // Generate CSV file
        $csvFileName = now()->format('Ymd_His').'-'.Session::get('loginData')['MerchantID'].'-bulk_voucher_procurement.csv';
        $csvFilePath = public_path('uploads/csvFile/' . $csvFileName);

        $csvFile = fopen($csvFilePath, 'w');

        // Data
        $merchantIDs = $request->input('merchantId');
        $pluCodes = $request->input('pluCode');
        $quantities = $request->input('quantity');
        $voucherAmounts = $request->input('voucherAmount');
        $notificationMethods = $request->input('notificationMethod');
        $notificationAddresses = $request->input('notificationAddress');
        $additionalData = $request->input('additionalData');

        $batchNumner = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        foreach ($merchantIDs as $index => $merchantID) {

            $voucherData = [
                'B'.$batchNumner,
                str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
                $merchantID,
                '',
                $pluCodes[$index] ?? '',
                $quantities[$index] ?? '',
                $voucherAmounts[$index] ?? '',
                $notificationMethods[$index] ?? '',
                $notificationAddresses[$index] ?? '',
                'MEDICAL;'
            ];

            $patientData = [
                $additionalData[$index]['patient_name'] ?? '',
                $additionalData[$index]['patient_surname'] ?? '',
                $additionalData[$index]['patient_id_number'] ?? '',
            ];

            $patientMedicalSchemeName = [
                $additionalData[$index]['patient_medical_scheme_name'] ?? '',
                $additionalData[$index]['patient_medical_scheme'] ?? '',
            ];

            $deliveryAddress = [
                $additionalData[$index]['address_1'] ?? '',
                $additionalData[$index]['address_2'] ?? '',
                $additionalData[$index]['suburb'] ?? '',
                $additionalData[$index]['city'] ?? '',
                $additionalData[$index]['region'] ?? '',
                $additionalData[$index]['country_code'] ?? '',
                $additionalData[$index]['postal_code'] ?? '',
            ];

            $oncolData = [
                implode(",", $patientData),
                implode(",", $patientMedicalSchemeName),
                $additionalData[$index]['ICD10'] ?? '',
                $additionalData[$index]['CPT4'] ?? '',
                str_replace(" ", "", $additionalData[$index]['molecule']) ?? '',
                ($additionalData[$index]['nappi_code'] ?? '') . '|' . ($additionalData[$index]['dosage'] ?? ''),
                $additionalData[$index]['address_1'] ?? '',
                $additionalData[$index]['address_2'] ?? '',
                $additionalData[$index]['suburb'] ?? '',
                $additionalData[$index]['city'] ?? '',
                $additionalData[$index]['region'] ?? '',
                $additionalData[$index]['country_code'] ?? '',
                $additionalData[$index]['postal_code'] ?? '',
                $additionalData[$index]['pharmacy_name'] ?? '',
            ];
            
            $csvLine = implode("|", $voucherData).''.implode(";", $oncolData)."\r\n";
            fwrite($csvFile, $csvLine);
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
