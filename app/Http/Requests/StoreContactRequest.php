<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Allow all guests; restrict further in the controller via throttle middleware
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:100'],
            'company'   => ['nullable', 'string', 'max:100'],
            'email'     => ['required', 'email:rfc,dns', 'max:254'],
            'phone'     => ['nullable', 'string', 'max:30'],
            'subject'   => ['required', 'string', 'in:' . implode(',', $this->allowedSubjects())],
            'services'  => ['nullable', 'array', 'max:10'],
            'services.*'=> ['string', 'in:' . implode(',', $this->allowedServices())],
            'budget'    => ['nullable', 'string', 'in:<10k,10-50k,50-100k,>100k'],
            'message'   => ['required', 'string', 'min:10', 'max:3000'],

            // Honeypot — must be empty; bots fill it
            'website'   => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'subject.in'     => 'Please select a valid subject.',
            'services.*.in'  => 'One or more selected services are invalid.',
            'website.max'    => 'Submission rejected.',  // honeypot message is intentionally vague
        ];
    }

    // ──────────────────────────────────────────
    //  Allowlists — keeps validation DRY & safe
    // ──────────────────────────────────────────

    private function allowedSubjects(): array
    {
        return [
            'New Project / MVP',
            'Web & Mobile Development',
            'AI & Machine Learning',
            'Cloud & DevOps',
            'Custom Software',
            'Pricing & Packages',
            'Partnership Opportunity',
            'General Inquiry',
        ];
    }

    private function allowedServices(): array
    {
        return [
            'Web & Mobile',
            'AI / Automation',
            'Cloud & DevOps',
            'Custom Software',
            'SaaS Product',
            'UI/UX Design',
        ];
    }
}