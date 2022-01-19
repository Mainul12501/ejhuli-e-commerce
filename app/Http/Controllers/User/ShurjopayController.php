<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use smasif\ShurjopayLaravelPackage\ShurjopayService;


class ShurjopayController extends Controller
{
    //
    public function send(Request $request)
    {
        $pay    = new ShurjopayService();
        $pay->generateTxId();
        $datax   = [
            'amount'    => $request->total_amount,
            'custom1'   => 'username-'.$request->username,
            'custom2'   => '',
            'custom3'   => '',
            'custom4'   => '',
            'paymentterm'   => '',
            'minimumamount'   => '',
            'totalAmount'   => $request->total_amount,
            'paymentOption'   => 'shurjopay',
            'returnURL'   => route('viewCheckout'),
            'is_emi'    => 0,
        ];
        $pay->sendPayment($datax, route('viewCheckout'));

    }
    public function spSession(Request $request)
    {
        Session::put('spay_status', $request->status);
        Session::put('spay_msg', $request->msg);
        Session::put('spay_tx_id', $request->tx_id);
        Session::put('spay_bank_tx_id', $request->bank_tx_id);
        Session::put('spay_amount', $request->amount);
        Session::put('spay_bank_status', $request->bank_status);
        Session::put('spay_sp_code', $request->sp_code);
        Session::put('spay_sp_code_des', $request->sp_code_des);
        Session::put('spay_sp_payment_option', $request->sp_payment_option);
        Session::put('spay_custom1', $request->custom1);
        Session::put('spay_custom2', $request->custom2);
        Session::put('spay_custom3', $request->custom3);
        Session::put('spay_custom4', $request->custom4);
        return json_encode('sucess to put session.');
    }
}
