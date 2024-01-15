<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $companyName;
    public $email;
    public $subject;
    public $description;

    /**
     * Create a new message instance.
     */
    public function __construct($companyName, $email, $subject, $description)
    {
        $this->companyName = $companyName;
        $this->email = $email;
        $this->subject = $subject;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.contact-form');
    }
}
