<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly JobApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your application for ' . $this->application->job_title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.job_application_clientmail',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
