<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailActivationConfig extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
 
    public $token;
    public $supject;

    public function __construct($supject,$token)
    {
        //
        $this->token=$token;
        $this->supject=$supject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('TiketApp@gmail.com')->subject($this->supject)->view('activate_email_template');
        
    }
}
