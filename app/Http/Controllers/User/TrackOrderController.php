<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Order\TrackOrderRequest;
use App\Services\TrackingService;
use Response;

class TrackOrderController extends UserBaseController
{
    protected $success = false;
    protected $data = [];

    /**
     * This function loads the order tracking page
     * @return View
     */
    public function index()
    {
        return view('customer.order-tracking.order-tracking');
    }

    /**
     * This function gives the json response of order tracking
     * @param TrackOrderRequest $trackOrderRequest
     * @return json
     */
    public function trackOrder(TrackOrderRequest $trackOrderRequest)
    {
        $trackingData =  TrackingService::trackOrder($trackOrderRequest->order_no);
        if ($trackingData){
            $success = true;
            $data['order_no'] = $trackOrderRequest->order_no;
            $data['tracking_data'] = $trackingData;
        }
        return Response::json(['success' => $success,'data' => $data]);
    }
}
