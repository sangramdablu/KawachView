<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Allow all guests; restrict further in the controller via throttle middleware
        return true;
    }

    public function rules(): array
    {
        return [
            'job_slug'      => ['required', 'string', Rule::in(array_keys(config('careers')))],
            'full_name'     => ['required', 'string', 'min:2', 'max:100', 'regex:/^[\pL\s\-\.\']+$/u'],
            'email'         => ['required', 'email:rfc,dns', 'max:254'],
            'phone'         => ['nullable', 'string', 'regex:/^[\+\d\s\-\(\)]{7,20}$/'],
            'experience'    => ['nullable', 'string', 'max:50'],
            'linkedin_url'  => ['nullable', 'url', 'max:255'],
            'portfolio_url' => ['nullable', 'url', 'max:255'],
            'cover_letter'  => ['nullable', 'string', 'max:3000'],
            'resume'        => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],

            // Honeypot — must be empty; bots fill it
            'website'       => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'job_slug.required'   => 'Please select the position you\'re applying for.',
            'job_slug.in'         => 'Please select a valid open position.',
            'full_name.required'  => 'Please enter your full name.',
            'full_name.min'       => 'Name must be at least 2 characters.',
            'full_name.regex'     => 'Name may only contain letters, spaces, hyphens and dots.',
            'email.required'      => 'Please enter your email address.',
            'email.email'         => 'Please enter a valid email address.',
            'phone.regex'         => 'Please enter a valid phone number.',
            'linkedin_url.url'    => 'Please enter a valid URL (starting with https://).',
            'portfolio_url.url'   => 'Please enter a valid URL (starting with https://).',
            'resume.required'     => 'Please attach your resume.',
            'resume.mimes'        => 'Resume must be a PDF or Word document.',
            'resume.max'          => 'Resume must be smaller than 5MB.',
            'website.max'         => 'Submission rejected.', // honeypot message is intentionally vague
        ];
    }
}
