<?php

namespace App\Console\Commands;

use App\Mail\NewsletterMail;
use App\Models\ComposeNewsletter;
use App\Models\Newsletter;
use App\Models\ProcessLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ComposeNewsletterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compose:newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command composes the newsletter for the date it scheduled';

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
        try {
            $status = ComposeNewsletter::NOT_COMPOSED;
            $newsletters = ComposeNewsletter::getNewsletterForDate(date('Y-m-d'), $status);
            $subscribers = Newsletter::where('status', 1)->limit(2)->get();
            if (count($newsletters)) {
                foreach ($newsletters as $newsletter) {
                    $newsletterData = [
                        'title' => $newsletter->title,
                        'description' => $newsletter->description,
                        'image' => asset('storage/uploads/media/' . $newsletter->image),
                        'call_to_action' => $newsletter->link,
                    ];
                    if ($subscribers) {
                        foreach ($subscribers as $subscriber) {
                            Mail::to($subscriber->email)->send(new NewsletterMail($newsletterData));
                        }
                    }
                    ComposeNewsletter::where('id', $newsletter->id)->update(['composed' => ComposeNewsletter::COMPOSED]);
                }
               $logData = [
                   'subject' => 'Compose Newsletter',
                   'log_message' => 'Compose newsletter command has been executed successfully',
               ];
                $this->info("newsletters sent successfully");
                Log::info("Newsletter command executed successfully.");
            }else{
                $logData = [
                    'subject' => 'Compose Newsletter',
                    'log_message' => 'Compose newsletter command has been executed but no records found',
                ];
                Log::info("Newsletter command executed successfully but could not perform.");
                $this->info("newsletters not found");
            }
        }catch (\Exception $exception){
            $fileName = $exception->getFile();
            $line = $exception->getLine();
            $code = $exception->getCode();
            $error  = $exception->getMessage();
            $logData = [
                'subject' => 'Compose Newsletter',
                'log_message' => "Compose newsletter command has been failed.
                The error is $error in $fileName at $line with code $code",
            ];
            Log::info("Error occurred in newsletter command");
        }
        ProcessLog::processLog($logData);
        return true;
    }
}
