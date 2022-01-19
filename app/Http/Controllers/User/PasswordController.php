<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Http\Requests\User\Password\PasswordRequest;
use App\Http\Requests\User\Password\PasswordResetRequest;
use App\Http\Requests\User\Password\PasswordUpdateRequest;
use App\Mail\ChangePasswordMail;
use App\Models\User\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Response;

class PasswordController extends UserBaseController
{
    public function index()
    {
        return view('customer.password.password-setting');
    }

    public function updatePassword(PasswordRequest $passwordRequest)
    {
        $user = Auth::user();
        $originalPassword =  $user->getAuthPassword();
        if ($passwordRequest->currentPasswordStatus == 'verify'){
            if (Hash::check($passwordRequest->current_password,$originalPassword)){
                $response = Response::json(['status'=>'verified','message'=>'Current password matched']);

            }else{
                $response = Response::json(['status'=>'wrong','message'=>'Current password not matched']);
            }
        }else if ($passwordRequest->currentPasswordStatus == 'verified'){
            $newPassword = bcrypt($passwordRequest->confirm_password);
            User::where('id',$user->id)->update(['password' => $newPassword]);
            $response = Response::json(['status'=>'success','message'=>'Password updated successfully']);
        }
        return $response;
    }

    /**
     * This function loads the password reset page
     * @return View
     */
    public function resetPassword()
    {
        return view('customer.login.password-reset');
    }

    /**
     * This function sends a password reset email to customer,
     * @param PasswordResetRequest $resetRequest
     * @return json
     */
    public function resetMyPassword(PasswordResetRequest $resetRequest)
    {
        $token = Helper::generateToken();
        $email = $resetRequest->reset_email;
        $customer = Customer::join('users','customers.user_id','users.id')->where('customers.email',$email)->first();
        User::where('id',$customer->user_id)->update(['remember_token' => $token ]);
        $resetLink = route('setupPassword',[$token]);
        try{
            Mail::to($customer->email)->send(new ChangePasswordMail($customer,$token));
        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
        return Response::json(['status' => 'success','message' => 'Check your email, we have sent a email','link' => $resetLink]);
    }

    /**
     * This function loads a password setup page
     * @param $token
     * @return View
     */
    public function setupPassword($token)
    {
        $isTokenValid = User::where('remember_token',$token)->exists();
        if ($isTokenValid){
            return view('customer.login.create-new-password',['token' => $token]);
        }
        abort(404);
    }

    /**
     * This function updates new password for a customer
     * @param PasswordUpdateRequest $updateRequest
     * @return json
     */
    public function updateNewPassword(PasswordUpdateRequest $updateRequest)
    {
        $token = $updateRequest['token'];
        User::where(['remember_token' => $token])->update([
            'password' => bcrypt($updateRequest['confirm_password']),
            'remember_token' => null
        ]);
        return Response::json(['success' => true,'message' => 'Password updated successfully']);
    }
}
