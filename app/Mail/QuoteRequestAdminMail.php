<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public QuoteRequest $quote) {}

    public function build()
    {
        return $this->subject(
                'New Quote Request - ' . $this->quote->full_name
            )
            ->view('email.quote_thankyoumail');
    }
}