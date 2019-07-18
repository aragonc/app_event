<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Gracias por registrarte';
    public $people;

    /**
     * Create a new message instance.
     *
     * @param $people
     */
    public function __construct($people)
    {
        $this->people = $people;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-register')
                    ->with([
                        'name' => $this->people->name
                    ]);
    }
}
