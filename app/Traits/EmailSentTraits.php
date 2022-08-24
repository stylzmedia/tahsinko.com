<?php
namespace App\Traits;

use App\Mail\EventJoinMail;
use App\Models\Notification\Email;
use Illuminate\Support\Facades\Mail;

trait EmailSentTraits{

    protected function simpleEmail($subject, $name, $email, $message){
        try{
            Mail::to($email)->send(new EventJoinMail($subject, $name, $message));
        }catch (\Exception $e){
            //
        }
    }

    //method for store email information
    protected function emailStore($name,$email,$subject,$message){
        try{
            Email::create(['name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message]);
            return true;
        }catch(\Exception $e){
            return true;
        }

    }
}
