<?php

namespace App\Mail;

use App\Models\HireDeveloperRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireDeveloperClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly HireDeveloperRequest $hire) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your request to hire ' . $this->hire->developer_type,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.hire_developer_clientmail',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('public', 'brochures/Kawach-Company-Profile.pdf')
                ->as('Kawach-Company-Profile.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
