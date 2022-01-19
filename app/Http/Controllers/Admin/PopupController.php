<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Popup\PopupRequest;
use App\Models\Setting;
use App\Services\MediaService;
use Response;

class PopupController extends AdminBaseController
{
    /**
     * Thhis function returns the view for popup page
     * @return view
     */
    public function index()
    {
        $popup = [];
        $popup = Setting::select('setting_value')->where('setting_name','popup')->value('setting_value');
        if ($popup){
            $popup = json_decode($popup);
        }
        return view('admin.popup.popup', [
            'popup' => $popup
        ]);
    }

    /**
     * This function updates the popup details
     * @param PopupRequest $request
     * @return json
     */
    public function updatePopup(PopupRequest $request)
    {
        $preFile = $request->pre_popup_image;
        $hasFile = $request->hasFile('popup_image');
        $imageFile = $request->file('popup_image');
        $popupImage = MediaService::saveMedia($imageFile,$hasFile,$preFile);
        $popupData = [
            'title' => $request->title,
            'link' => $request->link,
            'popup_image' => $popupImage,
            'description' => $request->description,
        ];
        Setting::updateOrCreate(['setting_name' => 'popup'],['setting_value' => json_encode($popupData)]);
        return Response::json(['success' => true,'message' => 'Popup details updated successfully']);
    }
}
