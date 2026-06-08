<?php

namespace App\Jobs;

use App\Mail\QuoteRequestAdminMail;
use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendQuoteRequestAdminMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quote
    ) {}

    public function handle(): void
    {
        Mail::to(
            config('mail.admin_address', 'hello@kawachtech.com')
        )->send(
            new QuoteRequestAdminMail($this->quote)
        );
    }
}