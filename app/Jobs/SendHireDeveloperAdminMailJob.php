<?php

namespace App\Jobs;

use App\Mail\HireDeveloperAdminMail;
use App\Mail\HireDeveloperClientMail;
use App\Models\HireDeveloperRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendHireDeveloperAdminMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 3;
    public int $timeout = 60;

    public function backoff(): array
    {
        return [30, 60, 120];
    }

    public function __construct(public HireDeveloperRequest $hire) {}

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email');

        if (empty($adminEmail)) {
            Log::error('SendHireDeveloperAdminMailJob: MAIL_ADMIN_EMAIL is not set in .env / config/mail.php', [
                'hire_id' => $this->hire->id,
            ]);
            throw new \RuntimeException('Admin email (MAIL_ADMIN_EMAIL) is not configured.');
        }

        // ── 1. Send to admin ─────────────────────────────────────────
        Mail::to($adminEmail)->send(new HireDeveloperAdminMail($this->hire));

        Log::info('Hire developer admin mail sent.', [
            'hire_id' => $this->hire->id,
            'to'      => $adminEmail,
        ]);

        // ── 2. Send thank-you to client ──────────────────────────────
        Mail::to($this->hire->email)->send(new HireDeveloperClientMail($this->hire));

        Log::info('Hire developer client thank-you mail sent.', [
            'hire_id' => $this->hire->id,
            'to'      => $this->hire->email,
        ]);
    }

    public function failed(\Throwable $e): void
    {
        Log::error('SendHireDeveloperAdminMailJob failed permanently.', [
            'hire_id' => $this->hire->id,
            'error'   => $e->getMessage(),
        ]);
    }
}
