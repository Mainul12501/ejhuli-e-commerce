<?php

namespace App\Mail;

use App\Models\User\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Customer
     */
    private $customer;
    private $token;

    /**
     * Create a new message instance.
     *
     * @param Customer $customer
     * @param $token
     */
    public function __construct(Customer $customer,$token)
    {
        $this->customer = $customer;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.customer.account-created', [
            'customer'=>$this->customer,'token' =>$this->token
        ])->subject('Signup completed, Please verify your account');
    }
}
