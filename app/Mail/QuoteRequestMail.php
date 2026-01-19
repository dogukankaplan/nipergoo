<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public QuoteRequest $quote)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Yeni Teklif Talebi - ' . setting('site_name', 'NiPergo'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-request',
        );
    }
}
