<?php

namespace App\Http\Requests\User\Wallet;

use Illuminate\Foundation\Http\FormRequest;

class WalletAddRequest extends FormRequest
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
        $walletCheckArray =  [
            'payment_method' => 'required',
            'mobile_no' => 'required|numeric|digits_between:10,12',
            'txn_id' => 'required|string|min:5|max:255|unique:wallet_requests,txn_id',
            'wallet_amount' => 'required|numeric|min:50|max:10000',
        ];
        return $walletCheckArray;
    }
}
