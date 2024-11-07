<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address('testmail@flowtechbd.com', 'Flow Tech BD'),
            subject: 'Contact Form Message',

        );
    }

    public function content()
    {
        return new Content(
            view: 'mail.contact-form-message',
            with: [
                'data' => $this->data,
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
