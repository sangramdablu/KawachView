<?php

namespace App\Jobs;

use App\Mail\ClientThankYouMail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendClientThankYouMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public function backoff(): array
    {
        return [60, 120, 300];
    }

    public int $timeout = 60;

    public function __construct(private readonly Contact $contact)
    {
    }

    public function handle(): void
    {
        Mail::to($this->contact->email)->send(new ClientThankYouMail($this->contact));

        Log::info('Client thank-you mail sent', ['contact_id' => $this->contact->id]);
    }

    public function failed(\Throwable $exception): void
    {
        Log::error('SendClientThankYouMail job failed permanently', [
            'contact_id' => $this->contact->id,
            'error'      => $exception->getMessage(),
        ]);
    }
}

