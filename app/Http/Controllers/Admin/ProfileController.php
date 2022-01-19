<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Profile\ProfileUpdateRequest;
use App\Models\Admin\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Response;

class ProfileController extends AdminBaseController
{
    public function index()
    {
        $profile = Admin::getAdminProfileDetail(Auth::id());
        return view('admin.profile.profile',['profile' => $profile]);
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $userId = Auth::id();
       $login = [
           'username' => $request->contact,
           'profile_pic' => $this->updateProfilePic($request),
       ];
       if (isset($request->change_password)){
           $login['password'] = bcrypt($request->password);
       }
        $detail = [
            'name' => $request->name,
            'email' => $request->email,
        ];
       DB::beginTransaction();
       User::where('id',$userId)->update($login);
       Admin::where('user_id',$userId)->update($detail);
       DB::commit();
       return Response::json(['status'=>'success','message' => 'Profile updated successfully!',
           'profile_pic'=>$login['profile_pic']]);
    }

    /**
     * This function updates admin profile image
     * @param $request
     * @scope local
     * @return string
     */
    public function updateProfilePic($request)
    {
        $profileImg = $request->file('profile');
        if ($request->hasFile('profile')) {
            $profileImgName = $profileImg->getClientOriginalName();
            $path = Config::get('constants.paths.admin_profile');
            if ($request->preProfilePic !="null" && $request->preProfilePic){
                @unlink($path.$request->preProfilePic);
            }
            $uploadResult =  $profileImg->move($path,$profileImgName);
        }else{
            $profileImgName = $request->preProfilePic;
        }
        return $profileImgName;
    }
}
