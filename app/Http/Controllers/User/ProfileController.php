<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Profile\ProfileRequest;
use App\Models\User\Customer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Response;

class ProfileController extends UserBaseController
{
    public function index()
    {
        $profile = Customer::getCustomerProfile();
            return view('customer.profile.profile',['profile'=>$profile]);
    }

    /**
     * This function validates mobile number and
     * handover profile details to next function
     * @param ProfileRequest $profileRequest
     * @return json
     */
    public function updateProfile(ProfileRequest $profileRequest)
    {
        $userId = Auth::id();
        $previousMobile = User::where('id',$userId)->pluck('username')->first();
        if ($profileRequest->contact != $previousMobile ){
            if ($profileRequest->flag != 'verifyotp'){
                $otp = substr(rand(100000, 999999),0,4);
                Session::put('OTP',$otp);
                $response = Response::json(['status'=>'otpsent','otp'=>$otp]);
            }else{
                if (Session::get('OTP') != $profileRequest->otp){
                    $response = Response::json(['status'=>'wrongotp']);
                }else{
                    $response = $this->updateProfileDetails($profileRequest,$userId);
                }
            }
        }else{
            $response = $this->updateProfileDetails($profileRequest,$userId);
        }
        return $response;
    }

    /**
     * This function simply updates the profile details
     * @param $profileRequest
     * @param $userId
     * @scope local
     * @return Response
     */
    public function updateProfileDetails($profileRequest,$userId)
    {
        $data = [
            'first_name' => $profileRequest->first_name,
            'last_name' => $profileRequest->last_name,
            'email' => $profileRequest->email,
        ];
        $profilePic = $this->updateProfilePic($profileRequest);
        DB::beginTransaction();
        Customer::where('user_id',$userId)->update($data);
        DB::commit();
        User::where('id',$userId)->update(['username'=>$profileRequest->contact,'profile_pic' => $profilePic]);
        return Response::json(['status'=>'success','message' => 'Profile details updated successfully','profile_pic' => $profilePic]);
    }
    /**
     * This function updates customer profile image
     * @param $request
     * @scope local
     * @return string
     */
    public function updateProfilePic($request)
    {
        $profileImg = $request->file('profile_pic');
        if ($request->hasFile('profile_pic')) {
            $profileImgName = $profileImg->getClientOriginalName();
            $path = Config::get('constants.paths.customer_profile');
            if ($request->pre_profile !="null" && $request->pre_profile){
                @unlink($path.$request->pre_profile);
            }
            $uploadResult =  $profileImg->move($path,$profileImgName);
        }else{
            $profileImgName = $request->pre_profile;
        }

        return $profileImgName;
    }
}
