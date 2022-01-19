<?php


namespace App\Services;

use App\Models\User\Order;
use App\Models\User\OrderProcessing;

class TrackingService
{
    /**
     * This function is service to get order tracking details
     * @param $orderNo
     * @return collection
     */
    public static function trackOrder($orderNo)
    {
        $orderId = Order::select('id')->whereOrderNo($orderNo)->value('id');
        return OrderProcessing::whereOrderId($orderId)->get();
    }
}
