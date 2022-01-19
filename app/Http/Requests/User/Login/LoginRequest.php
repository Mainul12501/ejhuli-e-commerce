<?php

namespace App\Http\Requests\User\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $loginCheckArray = [
            'mobile' => 'required|numeric|digits:11',
            'password' => 'required|string|min:4|max:20',
        ];
        return $loginCheckArray;
    }
}
