<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageRegister extends Mailable
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
        $this->subject = 'INFORMES: '.$event->title;
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
                        'school' => $this->event->category->image,
                        'phone' => $this->event->contact_phone,
                        'whatsapp' => $this->event->whatsapp,
                        'background' => $this->event->email_color
                    ]);
    }
}
