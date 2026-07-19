<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHireDeveloperRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Allow all guests; restrict further in the controller via throttle middleware
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name'       => ['required', 'string', 'min:2', 'max:100', 'regex:/^[\pL\s\-\.\']+$/u'],
            'company'         => ['nullable', 'string', 'max:150'],
            'email'           => ['required', 'email:rfc,dns', 'max:254'],
            'phone'           => ['nullable', 'string', 'regex:/^[\+\d\s\-\(\)]{7,20}$/'],
            'developer_slug'  => ['required', 'string', Rule::in(array_keys(config('hire_developers')))],
            'engagement_type' => ['nullable', 'string', 'in:Full-time,Part-time,Hourly,Project-based'],
            'team_size'       => ['nullable', 'string', 'in:1 Developer,2-5 Developers,5+ Developers,Not sure yet'],
            'budget'          => ['nullable', 'string', 'in:<10k,10-50k,50-100k,>100k'],
            'description'     => ['required', 'string', 'min:20', 'max:3000'],

            // Honeypot — must be empty; bots fill it
            'website'         => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required'      => 'Please enter your full name.',
            'full_name.min'           => 'Name must be at least 2 characters.',
            'full_name.regex'         => 'Name may only contain letters, spaces, hyphens and dots.',
            'email.required'          => 'Please enter your email address.',
            'email.email'             => 'Please enter a valid email address.',
            'phone.regex'             => 'Please enter a valid phone number.',
            'developer_slug.required' => 'Please select a developer type.',
            'developer_slug.in'       => 'Please select a valid developer type.',
            'description.required'   => 'Please tell us a bit about what you need.',
            'description.min'        => 'Please provide at least 20 characters so we can prepare a useful response.',
            'website.max'             => 'Submission rejected.', // honeypot message is intentionally vague
        ];
    }
}
