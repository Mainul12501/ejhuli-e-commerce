<?php

namespace App\Http\Controllers\User;

use App\Mail\AccountCreated;
use App\Mail\ChangePasswordMail;
use App\Models\User\Customer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class CommandController extends UserBaseController
{
    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');
    }

    /**
     * This function is just to check mail send id working or not
     */
    public function checkMail()
    {
        try{
            $token = 'ddd';
            $customer = Customer::where('user_id',14)->first();
            Mail::to('ankitprajapati123456@gmail.com')
                ->send(new AccountCreated($customer,$token));
            echo "success !" ;
        }catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }
}
