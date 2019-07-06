<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageRegister extends Mailable
{
    use Queueable, SerializesModels;

    public  $subject = 'Gracias por registrarte';
    public $distressCall;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($distressCall)
    {
        $this->distressCall = $distressCall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-register');
    }
}
