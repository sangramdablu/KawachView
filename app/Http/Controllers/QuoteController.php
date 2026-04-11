<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\QuoteRequestMail;
use App\Models\QuoteRequest;

class QuoteController extends Controller
{
    public function store(Request $request)
    {
        // ── Backend Validation ──────────────────────────────────────
        $validated = $request->validate([
            'full_name'   => ['required', 'string', 'min:2', 'max:100', 'regex:/^[\pL\s\-\.\']+$/u'],
            'company'     => ['nullable', 'string', 'max:150'],
            'email'       => ['required', 'email:rfc,dns', 'max:254'],
            'phone'       => ['nullable', 'string', 'regex:/^[\+\d\s\-\(\)]{7,20}$/'],
            'services'    => ['nullable', 'array', 'max:10'],
            'services.*'  => ['string', 'in:Web & Mobile Apps,AI & Machine Learning,Cloud & DevOps,Custom Software,SaaS Product,UI/UX Design'],
            'budget'      => ['nullable', 'string', 'in:<10k,10-50k,50-100k,>100k'],
            'description' => ['required', 'string', 'min:20', 'max:3000'],
        ], [
            // Custom error messages
            'full_name.required'      => 'Please enter your full name.',
            'full_name.min'           => 'Name must be at least 2 characters.',
            'full_name.regex'         => 'Name may only contain letters, spaces, hyphens and dots.',
            'email.required'          => 'Please enter your email address.',
            'email.email'             => 'Please enter a valid email address.',
            'phone.regex'             => 'Please enter a valid phone number.',
            'description.required'    => 'Please describe your project.',
            'description.min'         => 'Project description must be at least 20 characters.',
            'description.max'         => 'Project description may not exceed 3000 characters.',
        ]);
 
        try {
            // ── Save to DB ──────────────────────────────────────────
            $quote = QuoteRequest::create([
                'full_name'   => $validated['full_name'],
                'company'     => $validated['company'] ?? null,
                'email'       => $validated['email'],
                'phone'       => $validated['phone'] ?? null,
                'services'    => !empty($validated['services']) ? implode(', ', $validated['services']) : null,
                'budget'      => $validated['budget'] ?? null,
                'description' => $validated['description'],
                'ip_address'  => $request->ip(),
                'user_agent'  => $request->userAgent(),
            ]);
 
            // ── Send notification email ─────────────────────────────
            // Mail::to(config('mail.quote_recipient', 'hello@innovatetech.io'))
            //     ->send(new QuoteRequestMail($quote));
 
            return response()->json([
                'success' => true,
                'message' => 'Your quote request has been received. We\'ll get back to you within 24 hours.',
            ], 201);
 
        } catch (\Exception $e) {
            Log::error('QuoteRequest store failed: ' . $e->getMessage());
 
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong on our end. Please try again in a moment.',
            ], 500);
        }
    }
}
