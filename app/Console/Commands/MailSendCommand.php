<?php

namespace App\Console\Commands;
use App\Mail\CommonMail;
use App\Models\Notification\Email;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emailSent:sent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email sent command';

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
     * @return int
     */
    public function handle()
    {
        $emails = Email::where(['try'=>0])->limit(50)->get(['id','name','email','subject','message']);
        if (count($emails)>0){
            foreach ($emails as $email){
                try {
                    Mail::to($email)->bcc(env('ADMIN_NOTIFY_MAIL'))->send(new CommonMail($email));
                    $email->update(['try'=>1,'is_sent'=>1]);
                }catch (\Exception $e){
                    $email->update(['try'=>1]);
                }
            }
        }
    }
}
