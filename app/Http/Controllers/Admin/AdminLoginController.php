<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Util\Json;

class AdminLoginController extends AdminDashboardController
{
    /**
     * This loads the admin login page
     * @return view
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * This function validates the admin login
     * @param Request $loginRequest
     * @return Json
     */
    public function validateAdminLogin(Request $loginRequest)
    {
        $username = $loginRequest->username;
        $password = $loginRequest->password;

        $loginDetails = ['username' => $username,'password' => $password,'user_type'=>1];

        if (Auth::attempt($loginDetails)){
            $response =  response()->json(['status'=>'success']);
        }else{
            $response =  response()->json(['status'=>'failed']);
        }
        return $response;
    }

    /**
     * This function logouts the admin
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::route('adminLogin');
    }
}
