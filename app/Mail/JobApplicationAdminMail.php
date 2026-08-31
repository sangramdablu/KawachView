<?php

namespace App\Mail;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplicationAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly JobApplication $application) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Job Application] ' . $this->application->job_title
                . ' — ' . $this->application->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.job_application_adminmail',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('local', $this->application->resume_path)
                ->as($this->application->resume_original_name ?? 'resume.pdf'),
        ];
    }
}
