<?php

namespace App\Http\Requests\User\Signup;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
        /*$signUpCheckArray = [
            'mobile_number' => 'required|numeric|digits:10|unique:users,username'
        ];
        if ($this->signupFlag == 'otpsent'){
            $signUpCheckArray['otp'] = 'required|numeric|digits:4';
        }
        if ($this->signupFlag == 'otpverified'){
            $signUpCheckArray['email'] = 'required|email|min:1|max:50|unique:customers,email';
            $signUpCheckArray['password'] = 'required|string|min:4|max:20';
        }
        return $signUpCheckArray;*/
        $signUpCheckArray = [
            'mobile_number' => 'required|numeric|digits:11'
        ];
        if ($this->flag == 'mobileverified'){
            $signUpCheckArray['email'] = 'required|email|min:1|max:50|unique:customers,email';
            $signUpCheckArray['password'] = 'required|string|min:4|max:20';
        }
        return $signUpCheckArray;
    }
}
