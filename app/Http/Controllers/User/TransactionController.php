<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Http\Requests\User\Wallet\WalletAddRequest;
use App\Mail\WalletRequestReceived;
use App\Models\User\Customer;
use App\Models\User\RecentTransaction;
use App\Models\WalletRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Response;

class TransactionController extends UserBaseController
{
    public function index()
    {
        return view('customer.wallet.recent-transactions');
    }

    public function getTransactionDetail()
    {
        return view('customer.wallet.transaction-detail');
    }

    /**
     * This function adds money in wallet
     * @param WalletAddRequest $walletRequest
     * @return json
     */
    public function addMoneyInWallet(WalletAddRequest $walletRequest)
    {
        $userId = Auth::id();
        //DB::beginTransaction();

        //$currentBalance = Customer::getCurrentWalletBalance($userId);
        //$newBalance = $currentBalance + $walletRequest->wallet_amount;
        //Customer::where('user_id',$userId)->update(['wallet_balance'=>$newBalance]);
        //DB::commit();
        if (Customer::isAccountVerified($userId)){

            try {
                $customer = Customer::where('user_id',$userId)->first();
                $wallerRequestId = Helper::generateWalletRequestId();
                WalletRequest::addMoneyInWallet($walletRequest,$userId,$wallerRequestId);
                $message = 'Your add money request has been sent';
                Helper::sendNotificationToUser($userId, $message);
                Mail::to(config('constants.admin_email'))->send(new WalletRequestReceived($walletRequest,$wallerRequestId, $customer));
            }catch(\Exception $exception){}
            $response =  Response::json(['status'=>'success','message'=>'Your add money request has been sent']);
        }else{
            $response = Response::json(['status'=>'error','message'=>'You need to verify your account']);
        }
        return $response;
    }

    /**
     * This function returns recent transactions
     * @return json
     */
    public function getRecentTransactions()
    {
        $recentTransactions = RecentTransaction::getRecentTransactions();
        return Response::json(['status'=>'success','data'=> $recentTransactions]);
    }
}
