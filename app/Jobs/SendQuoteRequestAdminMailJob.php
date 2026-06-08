<?php

namespace App\Jobs;

use App\Mail\QuoteRequestAdminMail;
use App\Mail\QuoteRequestClientMail;
use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendQuoteRequestAdminMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries   = 3;
    public int $timeout = 60;

    public function backoff(): array
    {
        return [30, 60, 120];
    }

    public function __construct(public QuoteRequest $quote) {}

    public function handle(): void
    {
        $adminEmail = config('mail.admin_email');

        // ── Guard: fail loudly if admin email is not configured ──────
        if (empty($adminEmail)) {
            Log::error('SendQuoteRequestAdminMailJob: MAIL_ADMIN_EMAIL is not set in .env / config/mail.php', [
                'quote_id' => $this->quote->id,
            ]);
            // Throw so the job is marked as failed, not silently swallowed
            throw new \RuntimeException('Admin email (MAIL_ADMIN_EMAIL) is not configured.');
        }

        // ── 1. Send to admin ─────────────────────────────────────────
        Mail::to($adminEmail)->send(new QuoteRequestAdminMail($this->quote));

        Log::info('Quote admin mail sent.', [
            'quote_id' => $this->quote->id,
            'to'       => $adminEmail,
        ]);

        // ── 2. Send thank-you to client ──────────────────────────────
        Mail::to($this->quote->email)->send(new QuoteRequestClientMail($this->quote));

        Log::info('Quote client thank-you mail sent.', [
            'quote_id' => $this->quote->id,
            'to'       => $this->quote->email,
        ]);
    }

    public function failed(\Throwable $e): void
    {
        Log::error('SendQuoteRequestAdminMailJob failed permanently.', [
            'quote_id' => $this->quote->id,
            'error'    => $e->getMessage(),
        ]);
    }
}