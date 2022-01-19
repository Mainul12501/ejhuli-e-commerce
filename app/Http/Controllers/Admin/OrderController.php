<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Helper\ResponseHelper;
use App\Mail\OrderMarked;
use App\Models\Admin\Discount;
use App\Models\User\Order;
use App\Models\User\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Response;

class OrderController extends AdminBaseController
{
    /**
     * This function loads the page to load the orders
     * @return view
     */
    public function index()
    {
        return view('admin.orders.orders');
    }
    public function mail()
    {
        return view('emails.customer.order-marked');
    }

    /**
     * This function returns the list of orders
     * @param Request $request
     * @return json
     * @throws \Exception
     */
    public function getOrdersList(Request $request)
    {
        $orders = Order::getOrdersList($request);
        return datatables($orders)->addIndexColumn()->make(true);
    }

    /**
     * This function markes the order is valid and confirms it
     * @param Request $request
     * @return json
     */
    public function confirmOrder(Request $request)
    {
        $confirm = Order::confirmOrder($request->orderId,$request->remark);
        if ($confirm){
            Helper::orderProcessingNotify($request->orderId);
            Helper::sendOrderProcessedMail($request->orderId);
            $response = Response::json(['status'=>'success','message'=>'Order confirmed successfully']);
        }else{
            $response = Response::json(['status'=>'error','message'=>'Some Error']);
        }
        return $response;
    }

    /**
     * This function markes the order is delivered
     * @param Request $request
     * @return json
     */
    public function markDelivered(Request $request)
    {
        $deliver = Order::markDelivered($request->orderId,$request->remark);
        if ($deliver){
            Helper::orderProcessingNotify($request->orderId);
            Helper::sendOrderProcessedMail($request->orderId);
            $response = Response::json(['status'=>'success','message'=>'Order marked to delivered successfully']);
        }else{
            $response = Response::json(['status'=>'error','message'=>'Some Error']);
        }
        return $response;
    }

    /**
     * This function cancels the order
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelOrder(Request $request)
    {
        try {
            $deliver = Order::cancelOrder($request->orderId, $request->remark);
            if ($deliver){
                Helper::orderProcessingNotify($request->orderId);
                Helper::sendOrderProcessedMail($request->orderId);
                $response = ResponseHelper::successResponse('Order marked to canceled successfully');
            }else{
                $response = ResponseHelper::errorResponse('Some error occurred');
            }
        }catch (\Exception $exception) {
            $response = ResponseHelper::errorResponse('Some error occurred' . $exception->getMessage());
        }
        return $response;
    }

    /**
     * This function shows the order detail for a order
     * @param $orderId
     * @return view
     */
    public function getOrderDetail($orderId)
    {
        $discountsArr = [];
        $totalDiscountPer = 0.0;
        $totalDiscountAmount = 0.0;
        $productSubTotal = 0.0;
        $order = Order::getOrderDetail($orderId,'');
        $orderDetail = OrderProduct::getOrderProductDetail($orderId,'');
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
            return view('admin.orders.order-detail', [
                'order' => $order,
                'orderDetail' => $orderDetail,
                'discounts' => $discountsArr,
                'totalPaymentAmount' => $totalPaymentAmount,
                'deliveryChargeAmount' =>$deliveryChargeAmount,
                'totalDiscountAmount' => $totalDiscountAmount,
                'totalDiscountPer' => $totalDiscountPer,
                'productSubTotal' =>$productSubTotal,
            ]);
        }else{
            abort(404);
        }
    }
}
