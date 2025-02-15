<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Session;

class BalancesReportController extends Controller
{
    public function index(Request $request){

        $loginData = Session::get('loginData');

        if ($loginData && in_array($loginData['userType'], ['admin', 'procurement'])) {
            return redirect()->route('errors.404');
        }
        
        $data['menu'] = 'Balances Report';

        // Check if the request is AJAX
        if ($request->ajax()) {
            $items = [];

            // Check if userId is set in session
            if (Session::has('loginData.userId')) {
                $userId = Session::get('loginData.userId');
                $data = [
                    'userReference' => $userId
                ];

                // Make curl request to fetch data
                $postResponse = $this->curlRequest(env('BALANCE_REPORT_URL'), 'POST', $data);

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
        return view('admin.reports.balances', $data);
    }
}
