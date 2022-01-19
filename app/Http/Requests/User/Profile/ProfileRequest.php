<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $profileCheckArray = [
            'first_name' => 'required|string|min:2|max:50',
            'last_name' => 'required|alpha_num|min:2|max:50',
            'email' => 'required|email|min:3|max:50',
            'contact' => 'required|numeric|digits_between:10,11',
            'profile_pic' => 'sometimes|required|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
        ];
        if ($this->flag == 'verifyotp'){
            $profileCheckArray['otp'] = 'required|numeric|digits:4';
        }
        return $profileCheckArray;
    }
}
