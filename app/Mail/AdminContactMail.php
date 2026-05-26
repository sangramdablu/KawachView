<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly Contact $contact)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[New Contact] ' . $this->contact->subject
                . ' — ' . $this->contact->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            /*
             * Make sure this path matches your ACTUAL blade file location.
             *
             * If your file is at:  resources/views/email/admin_contact_mail.blade.php
             *   → use:  view: 'email.admin_contact_mail'
             *
             * If your file is at:  resources/views/emails/admin/contact-notification.blade.php
             *   → use:  view: 'emails.admin.contact-notification'
             *
             * Pick one and be consistent. The path below matches what you pasted.
             */
            view: 'email.admin_contact_mail',
        );
    }
}