<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Http\Requests\User\Checkout\CheckoutRequest;
use App\Mail\OrderProcessed;
use App\Models\Admin\Discount;
use App\Models\Setting;
use App\Models\User\Customer;
use App\Models\User\CustomerAddress;
use App\Models\User\Order;
use App\Models\User\OrderProduct;
use App\Models\User\ShurjoPayPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Response;

class CheckoutController extends UserBaseController
{
    /**
     * This function loads the view of checkout page
     * @return View
     */
    public function index()
    {
        if (!\Cart::isEmpty() && Auth::check()){
            $addresses = CustomerAddress::getMyAddresses();
            $cashOnDelivery = Setting::select('setting_value')->where('setting_name','cash_on_delivery')->value('setting_value');
            $return =  view('customer.checkout.checkout',['addresses' => $addresses, 'cashOnDelivery' => $cashOnDelivery]);
        }else{
            /**
             * Don't allow user to view checkout page if cart is empty
             * redirect him to again cart page
             */
            $return =  Redirect::route('viewCart');
        }
        return $return;
    }


    /**
     * This function places order
     * @param CheckoutRequest $checkoutRequest
     * @return json
     */
    public function placeOrder(CheckoutRequest $checkoutRequest)
    {
        $conditions = '';
        $userId  = Auth::id();
        /*$accountVerified = Customer::isAccountVerified($userId);
        if (!$accountVerified){
            return Response::json(['status'=>'error','message'=>'You need to verify your account. Check your email']);
        }*/
        $cartConditions = \Cart::getConditions();
        $cartAmount = \Cart::getTotal();
        if ($checkoutRequest->payment_option == 'wallet'){
            if (!Customer::checkEnoughBalanceInWallet($userId,$cartAmount)){
               return Response::json(['status'=>'error','message'=>'You dont have enough balance in wallet']);
            }
        }
        if ($cartConditions){
            foreach($cartConditions as $condition) {
                $conditions  .=  $condition->getName().',';
            }
            $conditions = ltrim($conditions,',');
            $conditions = rtrim($conditions,',');
        }

        $orderNumber = $this->getOrderNumber();
        $shurjopay    = ShurjoPayPayment::setSpDataSession();
        Order::placeOrder($checkoutRequest,$orderNumber,$shurjopay,$conditions);
        Helper::sendOrderProcessedMail(Order::getOrderIdByOrderNo($orderNumber));
        \Cart::clear();
        \Cart::clearCartConditions();
        $response =  Response::json(['status'=>'success','message'=>'Order placed successfully']);

//        shurjopay getway
        ShurjoPayPayment::deleteSPdata();

        return $response;
    }

    /**
     * This function generates unique order number
     * @scope local
     * @return string
     */
    public function getOrderNumber()
    {
        $random = substr(mt_rand(),0,5);
        $orderNumber = strtoupper('ejhuli').$random;
        $orderNumberFound = Order::select('id')->where('order_no',$orderNumber)->first();
        if ($orderNumberFound){
            $this->getOrderNumber();
        }
        return $orderNumber;
    }
    /**
     * This function loads the order success page
     * @return view
     */
    public function orderCompleted()
    {
        return view('customer.order-completed.order-completed');
    }

   /* public function send()
    {
        $discountsArr = [];
        $totalDiscountPer = 0.0;
        $totalDiscountAmount = 0.0;
        $order = Order::getOrderDetail(8,'');
        $orderProducts = OrderProduct::getOrderProductDetail(8,'');
        if ($order->discounts) {
            $discountsArr = explode(',', $order->discounts);
            if ($discountsArr){
                foreach ($discountsArr as $discount) {
                    $discount = Discount::select('discount')->where('coupon_name', $discount)->value('discount');
                    $totalDiscountPer = $totalDiscountPer + $discount;
                }
            }
            $totalDiscountAmount = $totalDiscountPer * 100;
        }
        $totalPaymentAmount = $order->payment_amount;
        return view('emails.customer.order-placed', ['order' => $order, 'orderProducts' => $orderProducts,
                'discounts' => $discountsArr, 'totalPaymentAmount' => $totalPaymentAmount,
                'totalDiscountAmount' => $totalDiscountAmount, 'totalDiscountPer' => $totalDiscountPer,
            ]
        );
    }*/

}
