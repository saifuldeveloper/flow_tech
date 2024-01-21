<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $shipping;

    public function __construct($shipping)
    {
        $this->shipping = $shipping;
    }

    public function build()
    {
        return $this->subject('Order Confirmation')
                    ->view('frontend.pages.email');
    }
}
