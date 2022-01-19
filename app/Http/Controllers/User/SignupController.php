<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Http\Requests\User\Signup\CreateAccountRequest;
use App\Mail\AccountCreated;
use App\Models\Newsletter;
use App\Models\User\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Response;

class SignupController extends UserBaseController
{
    public function index()
    {
        return view('customer.signup.signup');
    }

    /**
     * This function creates the customers new account
     * @param CreateAccountRequest $accountRequest
     * @return json
     */
    /*public function createAccount(CreateAccountRequest $accountRequest)
    {
        $response = '';
       if ($accountRequest->signupFlag == 'verifyMobile'){
           $mobileNumber = $accountRequest->mobile_number;
           $otp = substr(rand(100000, 999999),0,4);
           Session::put('OTP',$otp);
           $response = Response::json(['status'=>'otpsent','otp'=>$otp]);

       }else if ($accountRequest->signupFlag == 'otpsent'){
           if (Session::get('OTP') == $accountRequest->otp){
               $response = Response::json(['status'=>'otpverified']);
           }else{
               $response = Response::json(['status'=>'wrongotp']);
           }
       }
       else if ($accountRequest->signupFlag == 'otpverified'){
            DB::beginTransaction();
            $token = Helper::generateToken();
            $createUser = User::createUser($accountRequest,$token);
            $customer = Customer::createCustomer($createUser->id,$accountRequest);
            Newsletter::subscribe($customer->email);
           // $this->sendWelcomeMail($customer,$token);
            try{
                Mail::to($customer->email)->send(new AccountCreated($customer,$token));
            }catch (\Exception $exception){}
            Auth::login($createUser);
            DB::commit();
           $response = Response::json(['status'=>'accountcreated','message' => 'Account created successfully !','link' => route('accountVerify',[$token])]);
       }
       return $response;
    }*/

    /**
     * This function sends the welcome email to registered customer
     * @param $customer
     * @param $token
     */
    public function sendWelcomeMail($customer,$token)
    {
        Mail::to($customer->email)->send(new AccountCreated($customer,$token));
    }

    /**
     * This function verifies the account, loads the view
     * @param $token
     * @return View
     */
    public function accountVerify($token)
    {
        $user = User::where('remember_token',$token)->first();
        if ($user){
            Customer::where('user_id',$user->id)->update(['email_verified' => 1]);
            return view('customer.signup.account-verified');
        }
        abort(404);
    }
    /**
     * This function creates the customers new account
     * @param CreateAccountRequest $accountRequest
     * @return json
     */
    public function createAccount(CreateAccountRequest $accountRequest)
    {
        $response = '';
        if ($accountRequest->flag == 'mobileverify') {
            $mobileExists = User::where('username', $accountRequest->mobile_number)->exists();
            if ($mobileExists) {
                return Response::json(['status' => 'alreadyexists', 'message' => 'This mobile number already exists']);
            }else{
                return Response::json(['status' => 'mobileverified']);
            }
        }
        DB::beginTransaction();
        $token = Helper::generateToken();
        $createUser = User::createUser($accountRequest,$token);
        $customer = Customer::createCustomer($createUser->id,$accountRequest);
        Newsletter::subscribe($customer->email);
        try{
            Mail::to($customer->email)->send(new AccountCreated($customer,$token));
            Session::put('customer_id_for_verify', $customer->id);
        }catch (\Exception $exception){}
        Auth::login($createUser);
        DB::commit();
        $response = Response::json(['status'=>'accountcreated','message' => 'Account created successfully !','link' => route('accountVerify',[$token])]);
        return $response;
    }
}
