<?php

namespace App\Jobs;

use App\Mail\AdminContactMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAdminContactNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Retry up to 3 times with an exponential backoff.
     */
    public int $tries = 3;

    public function backoff(): array
    {
        return [60, 120, 300]; // seconds between retries
    }

    /**
     * Drop the job after this many seconds to avoid infinite retry cycles.
     */
    public int $timeout = 60;

    public function __construct(private readonly Contact $contact)
    {
    }

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email');

        if (empty($adminEmail)) {
            Log::error('Admin email not configured (MAIL_ADMIN_EMAIL). Skipping admin notification.', [
                'contact_id' => $this->contact->id,
            ]);
            return;
        }

        Mail::to($adminEmail)->send(new AdminContactMail($this->contact));

        Log::info('Admin contact notification sent', ['contact_id' => $this->contact->id]);
    }

    /**
     * Called when all retries are exhausted.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('SendAdminContactNotification job failed permanently', [
            'contact_id' => $this->contact->id,
            'error'      => $exception->getMessage(),
        ]);
    }
}