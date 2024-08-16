<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UploadCsv;
use App\Http\Requests\UploadCsvRequest;
use Illuminate\Support\Facades\Session;

class UploadCsvController extends Controller
{
    public function create(){
        $data['menu'] = "Upload CSV";
        return view('admin.upload-csv.create',$data);
    }

    public function store(UploadCsvRequest $request){    
        $input = $request->all();
        $input['user_id'] = Session::get('loginData')['MerchantID'];
        if($file = $request->file('file')){
            $input['file'] = $this->fileMove($file, 'csvFile');
            $this->uploadFileToFtpServer($input['file']);
        }
        UploadCsv::create($input);

        // Flash success message and redirect
        \Session::flash('success', 'CSV file has been uploaded successfully!');
        return redirect()->route('upload-csv.create');
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