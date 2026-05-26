<?php

// ============================================================
//  HOW TO USE THIS FILE
//  --------------------
//  1. Copy this file to:  app/Console/Commands/TestContactMail.php
//  2. Run:  php artisan mail:test-contact {contact_id}
//     e.g.  php artisan mail:test-contact 1
//
//  This bypasses the queue entirely and sends both mails
//  synchronously so you can see real errors in the terminal.
// ============================================================

namespace App\Console\Commands;

use App\Mail\AdminContactMail;
use App\Mail\ClientThankYouMail;
use App\Models\Contact;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestContactMail extends Command
{
    protected $signature   = 'mail:test-contact {id : The contact record ID to use for the test}';
    protected $description = 'Send both contact mails synchronously to test configuration';

    public function handle(): int
    {
        $contact = Contact::find($this->argument('id'));

        if (! $contact) {
            $this->error("No contact found with ID {$this->argument('id')}");
            return self::FAILURE;
        }

        $this->info("Using contact: [{$contact->id}] {$contact->full_name} <{$contact->email}>");
        $this->newLine();

        // ── Admin mail ──────────────────────────────────────
        $adminEmail = config('mail.admin_email');
        if (empty($adminEmail)) {
            $this->error('MAIL_ADMIN_EMAIL is not set in .env / config/mail.php');
            return self::FAILURE;
        }

        $this->info("Sending admin notification to: {$adminEmail}");
        try {
            Mail::to($adminEmail)->send(new AdminContactMail($contact));
            $this->info('  ✓ Admin mail sent successfully');
        } catch (\Throwable $e) {
            $this->error('  ✗ Admin mail FAILED: ' . $e->getMessage());
            $this->line($e->getTraceAsString());
            return self::FAILURE;
        }

        $this->newLine();

        // ── Client thank-you mail ───────────────────────────
        $this->info("Sending thank-you mail to client: {$contact->email}");
        try {
            Mail::to($contact->email)->send(new ClientThankYouMail($contact));
            $this->info('  ✓ Client thank-you mail sent successfully');
        } catch (\Throwable $e) {
            $this->error('  ✗ Client mail FAILED: ' . $e->getMessage());
            $this->line($e->getTraceAsString());
            return self::FAILURE;
        }

        $this->newLine();
        $this->info('Both mails sent. Check your inbox / Mailpit / Mailtrap.');

        return self::SUCCESS;
    }
}