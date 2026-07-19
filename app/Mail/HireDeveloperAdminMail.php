<?php

namespace App\Mail;

use App\Models\HireDeveloperRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HireDeveloperAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly HireDeveloperRequest $hire) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Hire Developer] ' . $this->hire->developer_type
                . ' — ' . $this->hire->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.hire_developer_adminmail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
