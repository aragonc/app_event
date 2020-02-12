<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $people;
    public $event;

    /**
     * Create a new message instance.
     *
     * @param $people
     * @param $event
     */
    public function __construct($people, $event)
    {
        $this->people = $people;
        $this->event = $event;
        $this->subject = 'Notificación: '.$event->title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-notification')
                    ->with([
                        'name' => $this->people->name,
                        'event_title' => $this->event->title,
                        'email' => $this->people->email,
                        'dni' => $this->people->dni,
                        'country' => $this->people->country,
                        'phone' => $this->event->contact_phone,
                        'background' => $this->event->email_color
                    ]);
    }
}
