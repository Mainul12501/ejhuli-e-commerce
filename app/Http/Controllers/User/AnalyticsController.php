<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Models\User\Customer;
use App\Models\User\Order;
use Illuminate\Support\Facades\Auth;

class AnalyticsController extends UserBaseController
{
    /**
     * This function laods the customer analytics view with information
     * @return View
     */
    public function index()
    {
        $userId = Auth::id();
        $totalOrders = Order::getMyTotalOrderAndSpent($userId);
        $walletBalance = Customer::getCurrentWalletBalance($userId);
        return view('customer.analytics.analytics',[
            'total_orders' => $totalOrders->count(),
            'total_spent' => Helper::formatTheNumber($totalOrders->sum('payment_amount')),
            'wallet_balance' => Helper::formatTheNumber($walletBalance),
        ]);
    }
}
