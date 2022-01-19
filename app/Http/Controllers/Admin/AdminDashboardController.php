<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Newsletter;
use App\Models\User\Customer;
use App\Models\User\Order;

class AdminDashboardController extends AdminBaseController
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalNewsletters = Newsletter::count();
        $totalCollection = Order::sum('payment_amount');
        $totalWalletsAmount = Customer::sum('wallet_balance');
        return view('admin.dashboard',[
            'totalCustomers' => $totalCustomers,
            'totalCategories' => $totalCategories,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalNewsletters' => $totalNewsletters,
            'totalCollection' => Helper::formatTheNumber($totalCollection),
            'totalWalletsAmount' => Helper::formatTheNumber($totalWalletsAmount),
        ]);
    }
}
