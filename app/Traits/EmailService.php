<?php

namespace App\Traits;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailShips;
use App\Mail\EmailActivationConfig;


trait EmailService
{
  
    public function send($email,$supject,$content)
    {
        Mail::mailer("mailgun")->to($email)->send(new EmailShips($supject,$content));
    }

    public function sendActivationCode($email,$supject,$token)
    {
        Mail::mailer("mailgun")->to($email)->send(new EmailActivationConfig($supject,$token));
    }


  
}
