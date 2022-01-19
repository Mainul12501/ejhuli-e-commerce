<?php

namespace App\Console\Commands;

use App\Mail\NewsletterMail;
use App\Models\User\Customer;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ReservationPendingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sends a reminder email to the persons whose choose reservation for start date
     and end date, and haven't completed the reservation booking process";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = Customer::all();
        if ($users){
            try {
                foreach($users as $user) {
                    //Notification::send($user->email, new WelcomeEmailNotification());
                    //Notification::route('mail', $user->email)->notify(new WelcomeEmailNotification());
                    Mail::to($user->email)->send(new NewsletterMail());
                }
                Log::info("Command executed successfully.");
            }catch(\Exception $exception){
                echo $exception->getMessage();
            }

        }
    }
}
