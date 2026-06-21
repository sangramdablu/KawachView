<?php

namespace App\Jobs;

use App\Mail\ConsultationClientMail;
use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendConsultationClientMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public ConsultationRequest $consultation
    ) {}

    public function handle(): void
    {
        Mail::to($this->consultation->email)
            ->send(
                new ConsultationClientMail($this->consultation)
            );
    }
}