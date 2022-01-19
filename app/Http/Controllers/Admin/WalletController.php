<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Mail\WalletRequestStatusUpdatedMail;
use App\Models\User\Customer;
use App\Models\WalletRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Response;

class WalletController extends AdminBaseController
{
    /**
     * This function loads the wallet list view
     * @return View
     */
    public function index()
    {
        return view('admin.wallet.wallet-requests');
    }

    /**
     * This function returns all the wallet requests
     * @param Request $walletListRequest
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
    public function listWalletRequests(Request $walletListRequest)
    {
        $discounts = WalletRequest::listWalletRequests($walletListRequest);
        return datatables($discounts)->addIndexColumn()->make(true);
    }

    /**
     * This function approves,archives the wallet request raised by customer
     * @param Request $statusRequest
     * @return json
     */
    public function statusWalletRequest(Request $statusRequest)
    {
        $customer = Customer::where('user_id',$statusRequest->customerId);
        $walletRequest = WalletRequest::select('amount','request_id')->where('id',$statusRequest->walletId);

        if ($statusRequest->actionStatus == WalletRequest::APPROVED){
            $requestedAmount = $walletRequest->value('amount');
            $currentBalance = Customer::getCurrentWalletBalance($statusRequest->customerId);
            $newBalance = $currentBalance + $requestedAmount;
            $customer->update(['wallet_balance'=>$newBalance]);
        }
        WalletRequest::where('id',$statusRequest->walletId)->update(['status' => $statusRequest->actionStatus]);
        $actionMessage = ($statusRequest->actionStatus ==  WalletRequest::APPROVED ? "confirmed": "archived");
        $message = 'wallet request '.$actionMessage.' successfully';
        Helper::sendNotificationToUser($statusRequest->customerId,$message);
        $customerDetail = $customer->first();
        $walletRequest = $walletRequest->first();
        Mail::to($customerDetail->email)->send(new WalletRequestStatusUpdatedMail($walletRequest, $statusRequest->actionStatus));
        return Response::json(['status'=>'success','message'=> $message]);
    }
}
