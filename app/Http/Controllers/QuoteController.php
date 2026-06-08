<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\QuoteRequestMail;
use App\Models\QuoteRequest;
use Illuminate\Validation\Rule;
use App\Models\ScheduledCall;
use App\Jobs\SendQuoteRequestAdminMailJob;

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
            SendQuoteRequestAdminMailJob::dispatch($quote);
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

    public function scheduleCall(Request $request)
    {
        $validated = $request->validate([
            'full_name'      => ['required', 'string', 'min:2', 'max:100', 'regex:/^[\pL\s\-\.\']+$/u'],
            'email'          => ['required', 'email:rfc,dns', 'max:254'],
            'phone'          => ['nullable', 'string', 'regex:/^[\+\d\s\-\(\)]{7,20}$/'],
            'preferred_date' => ['required', 'date', 'after_or_equal:today',
                                 function ($attr, $value, $fail) {
                                     $dow = date('N', strtotime($value));
                                     if ($dow >= 6) {
                                         $fail('We don\'t schedule calls on weekends. Please select a weekday.');
                                     }
                                 }],
            'timezone'       => ['required', 'string', Rule::in(['EST','CST','MST','PST','GMT','CET','EET','IST','SGT','JST','AEST'])],
            'time_slot'      => ['required', 'string', Rule::in(['09:00','10:00','11:00','13:00','14:00','15:00'])],
            'call_topic'     => ['required', 'string', Rule::in([ 'New Project / MVP', 'Existing Project Help', 'Pricing & Packages', 'Partnership Opportunity', 'General Inquiry', ])],
            'wants_video'    => ['required', 'boolean'],
            'video_platform' => [Rule::requiredIf(fn() => (bool) $request->input('wants_video')), 'nullable', 'string',Rule::in(['Zoom', 'Microsoft Teams', 'Google Meet', 'Cisco Webex']),],
            'notes'          => ['nullable', 'string', 'max:1000'],
        ], [
            'full_name.required'      => 'Please enter your full name.',
            'full_name.min'           => 'Name must be at least 2 characters.',
            'full_name.regex'         => 'Name may only contain letters, spaces, hyphens and dots.',
            'email.required'          => 'Please enter your email address.',
            'email.email'             => 'Please enter a valid email address.',
            'phone.regex'             => 'Please enter a valid phone number.',
            'preferred_date.required' => 'Please select a preferred date.',
            'preferred_date.date'     => 'Please enter a valid date.',
            'preferred_date.after_or_equal' => 'Please select a future date.',
            'timezone.required'       => 'Please select your timezone.',
            'timezone.in'             => 'Please select a valid timezone.',
            'time_slot.required'      => 'Please select a preferred time slot.',
            'time_slot.in'            => 'Please select a valid time slot.',
            'call_topic.required'     => 'Please select a call topic.',
            'call_topic.in'           => 'Please select a valid call topic.',
            'video_platform.required' => 'Please select a video call platform.',
            'video_platform.in'       => 'Please select a valid video platform.',
            'notes.max'               => 'Notes may not exceed 1000 characters.',
        ]);
 
        try {
            $call = ScheduledCall::create([
                'full_name'      => $validated['full_name'],
                'email'          => $validated['email'],
                'phone'          => $validated['phone'] ?? null,
                'preferred_date' => $validated['preferred_date'],
                'timezone'       => $validated['timezone'],
                'time_slot'      => $validated['time_slot'],
                'call_topic'     => $validated['call_topic'],
                'wants_video'    => (bool) $validated['wants_video'],
                'video_platform' => $validated['video_platform'] ?? null,
                'notes'          => $validated['notes'] ?? null,
                'ip_address'     => $request->ip(),
                'user_agent'     => $request->userAgent(),
            ]);
 
            // Uncomment when mail is configured:
            // Mail::to($validated['email'])->send(new ScheduleConfirmationMail($call));
            // Mail::to(config('mail.schedule_recipient', 'hello@kawachtech.com'))
            //     ->send(new ScheduleNotificationMail($call));
 
            return response()->json([
                'success' => true,
                'message' => 'Your call has been scheduled. Check your inbox for a confirmation.',
            ], 201);
 
        } catch (\Exception $e) {
            Log::error('ScheduledCall store failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong on our end. Please try again in a moment.',
            ], 500);
        }
    }

}
