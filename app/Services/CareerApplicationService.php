<?php

namespace App\Services;

use App\Jobs\SendJobApplicationMailJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CareerApplicationService
{
    /**
     * Store the uploaded resume privately (not web-accessible — it's an
     * applicant's personal document), persist the application, and
     * dispatch the notification/thank-you mail job.
     *
     * @param  array        $validated  Sanitised data from StoreJobApplicationRequest
     * @param  UploadedFile $resume
     * @param  Request      $request    Used to capture the client IP
     * @return JobApplication
     */
    public function store(array $validated, UploadedFile $resume, Request $request): JobApplication
    {
        // Remove honeypot / non-model fields before persisting
        unset($validated['website']);

        $jobSlug = $validated['job_slug'];
        $catalogue = config('careers');
        $jobTitle = $catalogue[$jobSlug]['title'] ?? $jobSlug;

        $resumePath = $resume->store('resumes', 'local');

        $application = JobApplication::create([
            'job_title'             => $jobTitle,
            'job_slug'              => $jobSlug,
            'full_name'             => $validated['full_name'],
            'email'                 => $validated['email'],
            'phone'                 => $validated['phone'] ?? null,
            'experience'            => $validated['experience'] ?? null,
            'linkedin_url'          => $validated['linkedin_url'] ?? null,
            'portfolio_url'         => $validated['portfolio_url'] ?? null,
            'cover_letter'          => $validated['cover_letter'] ?? null,
            'resume_path'           => $resumePath,
            'resume_original_name'  => $resume->getClientOriginalName(),
            'status'                => 'new',
            'ip_address'            => $request->ip(),
            'user_agent'            => $request->userAgent(),
        ]);

        SendJobApplicationMailJob::dispatch($application)->onQueue('emails');

        Log::info('Job application submitted', [
            'application_id' => $application->id,
            'job_title'       => $application->job_title,
        ]);

        return $application;
    }
}
