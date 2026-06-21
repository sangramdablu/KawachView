<?php

namespace App\Jobs;

use App\Mail\ConsultationAdminMail;
use App\Models\ConsultationRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendConsultationAdminMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public ConsultationRequest $consultation
    ) {}

    public function handle(): void
    {
        Mail::to(config('mail.admin_email'))
            ->send(
                new ConsultationAdminMail($this->consultation)
            );
    }
}