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
                        'name' => $this->people->name,
                        'event_title' => $this->event->title,
                        'brochure' => $this->event->brochure,
                        'content' => $this->event->content,
                        'banner' => $this->event->media,
                        'school' => $this->event->category->image
                    ]);
    }
}
