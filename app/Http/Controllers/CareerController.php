<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Services\CareerApplicationService;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    public function index()
    {
        $openings = collect(config('careers'))
            ->map(fn ($data, $slug) => array_merge($data, ['slug' => $slug]))
            ->values();

        $seoTitle       = 'Careers | Join Kawach Technology';
        $seoDescription = 'Explore open positions at Kawach Technology and apply to join our software development team.';
        $seoCanonical   = url('/careers');

        return view('pages.careers', compact('openings', 'seoTitle', 'seoDescription', 'seoCanonical'));
    }

    public function apply(StoreJobApplicationRequest $request, CareerApplicationService $service)
    {
        $validated = $request->validated();

        try {
            $application = $service->store($validated, $request->file('resume'), $request);

            return response()->json([
                'success' => true,
                'message' => "Thanks {$application->full_name}! We've received your application for {$application->job_title}. Our hiring team will be in touch if your profile is a match.",
            ], 201);

        } catch (\Exception $e) {
            Log::error('JobApplication store failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong on our end. Please try again in a moment.',
            ], 500);
        }
    }
}
