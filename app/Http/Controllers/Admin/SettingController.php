<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Settings\SettingsUpdateRequest;
use App\Models\Media;
use App\Models\Setting;
use App\Services\MediaService;
use Response;

class SettingController extends AdminBaseController
{
    /**
     * This function loads all the global settings
     * @return View
     */
   public function viewSettings()
   {
       $deliveryCharge = Setting::select('setting_value')->where('setting_name','delivery_charge')->first();
       $offerText = Setting::select('setting_value')->where('setting_name','offer_text')->first();
       $cashOnDelivery = Setting::select('setting_value')->where('setting_name','cash_on_delivery')->value('setting_value');
       $websiteLogo = Setting::select('setting_value')->where('setting_name','website_logo')->value('setting_value');
       $seoData = json_decode(Setting::select('setting_value')->where('setting_name','seo')->value('setting_value'));
       return view('admin.settings.settings',[
           'deliveryCharge' => $deliveryCharge,
           'offer_text' => $offerText,
           'cashOnDelivery' => $cashOnDelivery,
           'websiteLogo' => $websiteLogo,
           'seoData' => $seoData,
       ]);
   }

    /**
     * This function updates the global settings
     * @param SettingsUpdateRequest $updateRequest
     * @return json
     */
   public function updateSettings(SettingsUpdateRequest $updateRequest)
   {
       $deliveryCharge = $updateRequest->delivery_charge;
       $offerText = $updateRequest->offer_text;
       $cod = $updateRequest->cash_on_delivery;
       $metaDescription = $updateRequest->meta_description;
       $metaKeywords = $updateRequest->meta_keywords;
       $seoData = ['meta_description' => $metaDescription, 'meta_keywords' => $metaKeywords];
       $preFile = $updateRequest->pre_website_logo;
       $hasFile = $updateRequest->hasFile('website_logo');
       $logoFile = $updateRequest->file('website_logo');
       $logoFileName = MediaService::saveMedia($logoFile,$hasFile,$preFile);
       Setting::updateOrCreate(['setting_name' => 'delivery_charge'],['setting_value' => $deliveryCharge]);
       Setting::updateOrCreate(['setting_name' => 'offer_text'],['setting_value' => $offerText]);
       Setting::updateOrCreate(['setting_name' => 'cash_on_delivery'],['setting_value' => $cod]);
       Setting::updateOrCreate(['setting_name' => 'website_logo'],['setting_value' => $logoFileName]);
       Setting::updateOrCreate(['setting_name' => 'seo'],['setting_value' => json_encode($seoData)]);
       return Response::json(['success' => true,'message' => 'Settings updated successfully']);
   }
}
