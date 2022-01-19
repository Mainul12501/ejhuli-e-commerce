<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShurjoPayPayment extends Model
{
    //
    protected $guarded = [];

    public static function setSpDataSession()
    {
        $shurjopay = ShurjoPayPayment::create([
            'status'                        =>  Session::get('spay_status'),
        'msg'                               =>  Session::get('spay_msg'),
        'tx_id'                             =>  Session::get('spay_tx_id'),
        'bank_tx_id'                        =>  Session::get('spay_bank_tx_id'),
        'amount'                            =>  Session::get('spay_amount'),
        'bank_status'                       =>  Session::get('spay_bank_status'),
        'sp_code'                           =>  Session::get('spay_sp_code'),
        'sp_code_des'                       =>  Session::get('spay_sp_code_des'),
        'sp_payment_option'                 =>  Session::get('spay_sp_payment_option'),
//        'custom1'                           =>  Session::get('spay_custom1'),
        'custom1'                           =>  'username-'.Auth::user()->username,
        'custom2'                           =>  Session::get('spay_custom2'),
        'custom3'                           =>  Session::get('spay_custom3'),
        'custom4'                           =>  Session::get('spay_custom4'),
        ]);
        return $shurjopay;

    }
    public static function deleteSPdata()
    {
        Session::forget('spay_status');
        Session::forget('spay_msg');
        Session::forget('spay_tx_id');
        Session::forget('spay_bank_tx_id');
        Session::forget('spay_amount');
        Session::forget('spay_bank_status');
        Session::forget('spay_sp_code');
        Session::forget('spay_sp_code_des');
        Session::forget('spay_sp_payment_option');
        Session::forget('spay_custom1');
        Session::forget('spay_custom2');
        Session::forget('spay_custom3');
        Session::forget('spay_custom4');
    }
}
