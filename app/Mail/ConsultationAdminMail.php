<?php

namespace App\Mail;

use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ConsultationRequest $consultation
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[New Consultation] '.$this->consultation->full_name
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.consultation_adminmail'
        );
    }

    public function attachments(): array
    {
        return [];
    }
}