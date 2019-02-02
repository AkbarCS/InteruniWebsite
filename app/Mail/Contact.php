<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $email;
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $subject
     * @param $body
     */
    public function __construct($name, $email, $subject, $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact')->with([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'body' => $this->body,
        ]);
    }
}
