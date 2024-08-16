<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use App\Models\Carts;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){
        // Validate incoming request data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Prepare data for API request
        $data = [
            'username' => $request->input('username'),
            'password' => base64_encode($request->input('password')),
            'application' => "88",
        ];

        $user = User::where("email", $request['username'])->first();

        if (!empty($user)) {
            if (Hash::check($request['password'],$user['password']) == false) {
                \Session::flash('danger', 'Username or Password are incorrect. Please try again!');
                return redirect()->back();
            } else {
                $loginData = [
                    'name' => $user->name,
                    'MerchantID' => $request->input('username'),
                    'userId' => $user->id,
                    'userType' => 'admin',
                ];
                Session::put('loginData', $loginData);

                Carts::truncate();

                // Redirect to user dashboard upon successful login
                return redirect()->route('user.dashboard');
            }
        } else {
            $postResponse = $this->curlRequest(env('LOGIN_URL'), 'POST', $data);
            $apiResponse = json_decode($postResponse);
            
            // dd($apiResponse);

            // Check if API response contains userId
            if (!empty($apiResponse) && !empty($apiResponse->userId)) {
                // Store user data in session
                $loginData = [
                    'name' => $request->input('username'),
                    'MerchantID' => $request->input('username'),
                    'userId' => $apiResponse->userId,
                    'userType' => 'user',
                ];
                Session::put('loginData', $loginData);

                Carts::truncate();

                // Redirect to user dashboard upon successful login
                return redirect()->route('user.dashboard');
            } else {
                // Handle unsuccessful login attempt
                \Session::flash('danger', 'Username or Password are incorrect. Please try again!');
                return redirect()->back();
            }
        }
    }

    public function logout()
    {
        Session::forget('loginData');
        Session::flush();

        return redirect()->route('login');
    }
}
