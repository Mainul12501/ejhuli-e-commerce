<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Discount;
use App\Models\Setting;
use App\Models\User\Order;
use App\Models\User\OrderProcessing;
use App\Models\User\OrderProduct;
use App\Models\User\Review;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;

class OrderController extends UserBaseController
{
    /**
     * This function loads all the orders for a customer
     * @return View
     */
   public function index()
   {
       $myOrders = Order::getMyOrders(Auth::id());
       return view('customer.orders.orders',['myOrders'=>$myOrders]);
  }

    /**
     * This function returns the order details and shows in a view
     * @param $orderId
     * @return View
     */
   public function getOrderDetail($orderId)
   {
       $userId = Auth::id();
       $discountsArr = [];
       $totalDiscountPer = 0.0;
       $totalDiscountAmount = 0.0;
       $order = Order::getOrderDetail($orderId,$userId);
       $orderDeliveryDate = OrderProcessing::getDeliveredDate($orderId);
       $orderDetail = OrderProduct::getOrderProductDetail($orderId,$userId);
       $orderProcessing = OrderProcessing::getOrderProcessing($orderId);
       $myRatedProducts = Review::getMyRatedProducts($orderId);
       $productSubTotal = 0.0;
       if ($order) {
           $deliveryChargeAmount = ($order->delivery_charge?$order->delivery_charge:0);
           /**
            * Get the total discount %
            */
           if ($order->discounts) {
               $discountsArr = explode(',', $order->discounts);
               foreach ($discountsArr as $discount) {
                   $discount = Discount::select('discount')->where('coupon_name', $discount)->value('discount');
                   $totalDiscountPer = $totalDiscountPer + $discount;
               }
           }
           /**
            * Get the sub total sum of price of all products ordered
            */
           foreach ($orderDetail as $product){
               $productSubTotal = $productSubTotal+$product->price * $product->quantity;
           }
           /**
            * Calculate the final total payment amount
            */
           if ($order->discounts) {
               $totalDiscountAmount = $productSubTotal * $totalDiscountPer / 100;
               $totalPaymentAmount = ($productSubTotal - $totalDiscountAmount) + $deliveryChargeAmount;
           }else{
               $totalPaymentAmount = $productSubTotal + $totalDiscountAmount + $deliveryChargeAmount;
           }
           return view('customer.orders.order-detail', [
               'order' => $order,
               'orderDetail' => $orderDetail,
               'discounts' => $discountsArr,
               'totalPaymentAmount' => $totalPaymentAmount,
               'deliveryChargeAmount' =>$deliveryChargeAmount,
               'totalDiscountAmount' => $totalDiscountAmount,
               'totalDiscountPer' => $totalDiscountPer,
               'orderProcessing' => $orderProcessing,
               'orderDeliveryDate' => $orderDeliveryDate,
               'myRatedProducts' => $myRatedProducts,
               'productSubTotal' =>$productSubTotal,
           ]);
       }
       abort(404);
   }

    /**
     * This functionn prints/downloads the order invoice
     * @param $orderId
     * @return \View
     */
   public function downloadInvoice($orderId)
   {

       $userId = Auth::id();
       $order = Order::getOrderDetail($orderId,$userId);
       $orderDetail = OrderProduct::getOrderProductDetail($orderId,$userId);
       $totalDiscountPer = 0.0;
       $totalDiscountAmount = 0.0;
       $discountsArr = [];
       if ($order) {
           if ($order->discounts) {
               $discountsArr = explode(',', $order->discounts);
               foreach ($discountsArr as $discount) {
                   $discount = Discount::select('discount')->where('coupon_name', $discount)->value('discount');
                   $totalDiscountPer = $totalDiscountPer + $discount;
               }
               $totalDiscountAmount = $totalDiscountPer * 100;
           }
           $totalPaymentAmount = $order->payment_amount;

       /*   $pdf = \PDF::loadView('customer.orders.order-invoice', ['order' => $order, 'orderDetail' => $orderDetail,
               'discounts' => $discountsArr, 'totalPaymentAmount' => $totalPaymentAmount,
               'totalDiscountAmount' => $totalDiscountAmount, 'totalDiscountPer' => $totalDiscountPer]);
           return $pdf->download('posts2.pdf');*/

          return view('customer.orders.order-invoice', ['order' => $order, 'orderDetail' => $orderDetail,
               'discounts' => $discountsArr, 'totalPaymentAmount' => $totalPaymentAmount,
               'totalDiscountAmount' => $totalDiscountAmount, 'totalDiscountPer' => $totalDiscountPer]);
       }
        abort(404);

   }
}
