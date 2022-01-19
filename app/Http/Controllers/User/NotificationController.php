<?php

namespace App\Http\Controllers\User;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;

class NotificationController extends UserBaseController
{
    protected $success = false;
    public $data = [];

    /**
     * This function loads the all notifications view
     * @return View
     */
    public function index()
    {
        return view('customer.notifications.notification-list');
    }

    /**
     * This function returns the user notifications
     * @param Request $request
     * @return json
     */
    public function getNotifications(Request $request)
    {
        $userId = Auth::id();
        $limit = $request->limit;
        return Response::json(['notifications' => NotificationService::getNotifications($userId,$limit)]);
    }
    /**
     * This function returns the users all notifications
     * @param Request $request
     * @return json
     */
    public function getAllNotifications(Request $request)
    {
        $userId = Auth::id();
        return Response::json(['notifications' => NotificationService::getAllNotifications($userId)]);
    }

    /**
     * This function marks the single notification to be read
     * @param Request $request
     * @return json
     */
    public function markAsRead(Request $request)
    {
        $user = Auth::user();
        $notification = NotificationService::markAsRead($user,$request);
        if($notification) {
            $data['success'] = true;
            $data['message'] = "Notification marked as read";
            return Response::json($data);
        }
    }

    /**
     * This function marks all the notifications to be read
     * @return mixed
     */
    public function markAllAsRead()
    {
        $user = Auth::user();
        $notification = NotificationService::markAllAsRead($user);
        if($notification) {
            $data['success'] = true;
            $data['message'] = "All notifications marked as read";
            return Response::json($data);
        }
    }
}
