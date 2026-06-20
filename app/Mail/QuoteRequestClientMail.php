<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class QuoteRequestClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly QuoteRequest $quote)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for contacting Kawach Technology'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.quote_thankyoumail'
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk(
                'public',
                'brochures/Kawach-Company-Profile.pdf'
            )
            ->as('Kawach-Company-Profile.pdf')
            ->withMime('application/pdf'),
        ];
    }
}