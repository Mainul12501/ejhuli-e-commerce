<?php

namespace App\Http\Requests\User\Password;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
        return [
            'reset_email' => 'required|email|exists:customers,email',
//            'reset_phone' => 'required|numeric|min:12|exists:users,username'
        ];
    }
}
