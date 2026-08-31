<?php

namespace App\Jobs;

use App\Mail\JobApplicationAdminMail;
use App\Mail\JobApplicationClientMail;
use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendJobApplicationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 3;
    public int $timeout = 60;

    public function backoff(): array
    {
        return [30, 60, 120];
    }

    public function __construct(public JobApplication $application) {}

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email');

        if (empty($adminEmail)) {
            Log::error('SendJobApplicationMailJob: MAIL_ADMIN_EMAIL is not set in .env / config/mail.php', [
                'application_id' => $this->application->id,
            ]);
            throw new \RuntimeException('Admin email (MAIL_ADMIN_EMAIL) is not configured.');
        }

        // ── 1. Send to admin (with resume attached) ──────────────────
        Mail::to($adminEmail)->send(new JobApplicationAdminMail($this->application));

        Log::info('Job application admin mail sent.', [
            'application_id' => $this->application->id,
            'to'              => $adminEmail,
        ]);

        // ── 2. Send thank-you to applicant ────────────────────────────
        Mail::to($this->application->email)->send(new JobApplicationClientMail($this->application));

        Log::info('Job application client thank-you mail sent.', [
            'application_id' => $this->application->id,
            'to'              => $this->application->email,
        ]);
    }

    public function failed(\Throwable $e): void
    {
        Log::error('SendJobApplicationMailJob failed permanently.', [
            'application_id' => $this->application->id,
            'error'           => $e->getMessage(),
        ]);
    }
}
