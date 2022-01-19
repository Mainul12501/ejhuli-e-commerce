<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Mail\AccountCreated;
use App\Models\User\Customer;
use App\Models\User\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DashboardController extends UserBaseController
{
    public function index()
    {
        $userId = Auth::id();
        $currentPage = 'dashboard';
        $accountVerified = Customer::isAccountVerified($userId);
        $totalSpent = Order::getMyTotalSpent($userId);
        $walletBalance = Customer::getCurrentWalletBalance($userId);
        $orders = Order::where('user_id', $userId);
        $myOrders = $orders->count();
        $canceledOrders = $orders->where('status', Order::CANCELED)->count();

        return view('customer.dashboard.dashboard',[
            'accountVerified' => $accountVerified,
            'currentPage' => $currentPage,
            'total_orders' => $myOrders,
            'total_spent' => Helper::formatTheNumber($totalSpent),
            'wallet_balance' => Helper::formatTheNumber($walletBalance),
            'canceled_orders' => $canceledOrders,
        ]);
    }
    public function resendMail ($id)
    {
        $customer   = Customer::findOrFail($id);
        $token = Helper::generateToken();
        $user   = User::findOrFail(Auth::id());
        $user->remember_token   = $token;
        $user->save();
        Mail::to($customer->email)->send(new AccountCreated($customer,$token));
//        return json_encode('success');

        return redirect()->back()->with('show-success-alert', 'success');
    }

}
