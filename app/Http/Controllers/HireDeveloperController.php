<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHireDeveloperRequest;
use App\Jobs\SendHireDeveloperAdminMailJob;
use App\Models\HireDeveloperRequest;
use Illuminate\Support\Facades\Log;

class HireDeveloperController extends Controller
{
    public function index()
    {
        $developers = collect(config('hire_developers'))
            ->map(fn ($data, $slug) => array_merge($data, ['slug' => $slug]))
            ->groupBy('category');

        $seoTitle       = 'Hire Developers | Full Stack, React, Node.js & More | Kawach Technology';
        $seoDescription = 'Hire pre-vetted developers from Kawach Technology across full stack, frontend, backend, mobile, AI/ML and more. Flexible engagement, fast onboarding.';
        $seoCanonical   = url('/hire-developer');

        return view('pages.hire-developer', compact('developers', 'seoTitle', 'seoDescription', 'seoCanonical'));
    }

    public function show(string $slug)
    {
        $catalogue = config('hire_developers');

        abort_unless(isset($catalogue[$slug]), 404);

        $developer = array_merge($catalogue[$slug], ['slug' => $slug]);

        $otherDevelopers = collect($catalogue)
            ->map(fn ($data, $s) => array_merge($data, ['slug' => $s]))
            ->reject(fn ($d) => $d['slug'] === $slug)
            ->values();

        $seoTitle       = 'Hire ' . $developer['title'] . ' | Kawach Technology';
        $seoDescription = $developer['meta_description'];
        $seoCanonical   = url('/hire-developer/' . $slug);

        return view('pages.child.hire_developer_details', compact('developer', 'otherDevelopers', 'seoTitle', 'seoDescription', 'seoCanonical'));
    }

    public function store(StoreHireDeveloperRequest $request, string $slug)
    {
        $catalogue = config('hire_developers');
        abort_unless(isset($catalogue[$slug]), 404);

        $validated = $request->validated();

        try {
            $hire = HireDeveloperRequest::create([
                'full_name'       => $validated['full_name'],
                'company'         => $validated['company'] ?? null,
                'email'           => $validated['email'],
                'phone'           => $validated['phone'] ?? null,
                'developer_type'  => $catalogue[$slug]['title'],
                'developer_slug'  => $slug,
                'engagement_type' => $validated['engagement_type'] ?? null,
                'team_size'       => $validated['team_size'] ?? null,
                'budget'          => $validated['budget'] ?? null,
                'description'     => $validated['description'],
                'ip_address'      => $request->ip(),
                'user_agent'      => $request->userAgent(),
            ]);

            SendHireDeveloperAdminMailJob::dispatch($hire);

            return response()->json([
                'success' => true,
                'message' => "Thanks! We've received your request to hire {$catalogue[$slug]['title']}. Our team will reach out within 24 hours.",
            ], 201);

        } catch (\Exception $e) {
            Log::error('HireDeveloperRequest store failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong on our end. Please try again in a moment.',
            ], 500);
        }
    }
}
