<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Session;

class AccountReportController extends Controller
{
    public function index(Request $request){
        $data['menu'] = 'Account Report';

        // Check if the request is AJAX
        if ($request->ajax()) {
            $items = [];

            // Check if userId is set in session
            if (Session::has('loginData.userId')) {
                $userId = Session::get('loginData.userId');
                $dataToSend = [
                    'userReference' => $userId
                ];

                // Make curl request to fetch data
                $postResponse = $this->curlRequest(env('MERCHANT_ACCOUNTS_URL'), 'POST', $dataToSend);

                if (!empty($postResponse)) {
                    $items = json_decode($postResponse);
                } else {
                    // Handle case where curl request failed
                    return response()->json(['error' => 'Failed to fetch data.'], 500);
                }
            } else {
                // Handle case where userId is not set in session
                return response()->json(['error' => 'User session data not found.'], 403);
            }

            return DataTables::of($items)->addIndexColumn()->make(true);
        }

        // If not AJAX, return the view with data
        return view('admin.reports.account', $data);
    }
}
