<?php

namespace App\Mail;

use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ConsultationRequest $consultation
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank you for booking a consultation with ' . config('app.name')
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.consultation_clientmail'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}