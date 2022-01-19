<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\Newsletter\NewsletterRequest;
use App\Mail\NewsletterSubscribed;
use App\Models\Newsletter;
use App\Models\User\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Response;

class NewsletterController extends UserBaseController
{
    public function index()
    {
        $newsletterSetting = Customer::select('newsletter')->where('user_id',Auth::id())->value('newsletter');
        return view('customer.newsletter.newsletter-setting',['newsletterSetting' => $newsletterSetting]);
    }

    /**
     * This function subscribes the users
     * to our mailing list
     * @param NewsletterRequest $request
     * @return json
     */
    public function subscribe(NewsletterRequest $request)
    {
        try {
            Newsletter::subscribe($request->email);
            Mail::to($request->email)->send(new NewsletterSubscribed($request->email));
            $response = Response::json(['status'=>'success','message' => 'Thanks, You have subscribed to our newsletter']);
            return $response;
        }catch (\Exception $exception){

        }
    }

    /**
     * This function updates the newsletter setting for a customer uses
     * @param Request $request
     * @return json
     */
    public function changeNewsletterSetting(Request $request)
    {
        if ($request->setting == 1){
            $settingType = "recieve related";
        }else{
            $settingType = "not recieve";
        }
        $newsletter = $request->setting;

        if(Customer::where('user_id',Auth::id())->update(['newsletter' => $newsletter])){
            $response = Response::json(["status"=>"success","message" => "You will $settingType newsletter to your mail"]);
        }else{
            $response = Response::json(["status"=>"false","message" => "Some error occurred"]);
        }
        return $response;
    }
}
