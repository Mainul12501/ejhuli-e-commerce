<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends UserBaseController
{
    public function aboutUs()
    {
        return view('customer.pages.about-us.about-us');
    }
    public function contactUs()
    {
        return view('customer.pages.contact-us.contact-us');
    }

    public function termsAndConditions()
    {
        return view('customer.pages.term-condition.term-condition');
    }
    public function learnToRequestPayment()
    {
        return view('customer.pages.request-payment');
    }


}
