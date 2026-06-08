<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly QuoteRequest $quote) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your quote request — ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.quote_thankyoumail',  // see blade file below
        );
    }

    public function attachments(): array
    {
        return [];
    }
}