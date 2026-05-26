<?php

namespace App\Services;

use App\Jobs\SendAdminContactNotification;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Jobs\SendClientThankYouMail;
use Illuminate\Support\Facades\Log;

class ContactService
{
    /**
     * Persist the contact submission and dispatch both mail jobs.
     *
     * @param  array   $validated  Sanitised data from StoreContactRequest
     * @param  Request $request    Used to capture the client IP (stored encrypted)
     * @return Contact
     */
    public function store(array $validated, Request $request): Contact
    {
        // Remove honeypot field before persisting
        unset($validated['website']);

        $contact = Contact::create([
            ...$validated,
            'ip_address' => $request->ip(),
            'status'     => 'new',
        ]);

        // Dispatch both jobs to the 'emails' queue.
        // They run asynchronously — the HTTP response returns immediately.
        SendAdminContactNotification::dispatch($contact)
            ->onQueue('emails');

        SendClientThankYouMail::dispatch($contact)
            ->onQueue('emails');

        Log::info('Contact submission saved', [
            'contact_id' => $contact->id,
            'subject'    => $contact->subject,
        ]);

        return $contact;
    }
}