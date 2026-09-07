<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\JobPosting;
use App\Services\CareerApplicationService;
use App\Services\GeoLocationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    private const EMPLOYMENT_TYPE_MAP = [
        'Full-time'   => 'FULL_TIME',
        'Part-time'   => 'PART_TIME',
        'Contract'    => 'CONTRACTOR',
        'Internship'  => 'INTERN',
        'Freelance'   => 'CONTRACTOR',
    ];

    public function index(Request $request, GeoLocationService $geo)
    {
        $detectedCountry = $geo->detectCountry($request->ip());

        $jobs = JobPosting::where('status', 'active')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        // Country-targeted jobs rank first for a matching visitor — jobs
        // with no countries set (Global) are never hidden, just untouched
        // by this reorder, so they keep their admin-defined position.
        if ($detectedCountry) {
            $jobs = $jobs->sortByDesc(fn ($job) => in_array($detectedCountry, $job->countries ?? [], true))
                ->values();
        }

        $openings = $jobs->map(fn ($job) => [
            'slug'              => $job->slug,
            'title'             => $job->title,
            'department'        => $job->department,
            'location'          => $job->location,
            'countries'         => $job->countries ?? [],
            'type'              => $job->type,
            'experience_level'  => $job->experience_level,
            'summary'           => $job->summary,
            'responsibilities'  => $job->responsibilities ?? [],
            'requirements'      => $job->requirements ?? [],
            'nice_to_have'      => $job->nice_to_have ?? [],
        ]);

        [$seoTitle, $seoDescription, $seoKeywords] = $this->buildSeoMeta($jobs);
        $jobPostingSchema = $this->buildJobPostingSchema($jobs);
        $countryOptions = JobPosting::COUNTRIES;
        $seoCanonical = url('/careers');

        return view('pages.careers', compact(
            'openings',
            'seoTitle',
            'seoDescription',
            'seoKeywords',
            'seoCanonical',
            'jobPostingSchema',
            'countryOptions',
            'detectedCountry'
        ));
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

    /**
     * Real, non-fabricated SEO copy built from whatever roles are actually
     * open right now — includes each role's title and target countries so
     * the page has a genuine shot at ranking for "<role> jobs in <country>"
     * searches instead of a generic, country-blind "Careers" title.
     */
    private function buildSeoMeta($jobs): array
    {
        if ($jobs->isEmpty()) {
            return [
                'Careers | Join Kawach Technology',
                'Explore open positions at Kawach Technology and apply to join our software development team.',
                'careers at Kawach Technology, software developer jobs, remote software jobs India',
            ];
        }

        $countryNames = fn ($job) => collect($job->countries ?? [])
            ->map(fn ($c) => JobPosting::COUNTRIES[$c] ?? null)
            ->filter()
            ->values();

        $titleParts = $jobs->map(function ($job) use ($countryNames) {
            $countries = $countryNames($job);
            return $countries->isNotEmpty()
                ? "{$job->title} ({$countries->join(', ')})"
                : $job->title;
        });

        $seoTitle = 'Careers | Hiring ' . $titleParts->join(', ') . ' | Kawach Technology';
        $seoTitle = \Illuminate\Support\Str::limit($seoTitle, 155, '');

        $seoDescription = 'Kawach Technology is hiring: ' . $titleParts->join('; ')
            . '. Apply now to build web, mobile, cloud, and AI software with our remote-friendly engineering team.';
        $seoDescription = \Illuminate\Support\Str::limit($seoDescription, 300, '');

        $keywords = collect(['careers at Kawach Technology', 'software developer jobs']);
        foreach ($jobs as $job) {
            $keywords->push(strtolower($job->title) . ' jobs');
            foreach ($countryNames($job) as $countryName) {
                $keywords->push(strtolower($job->title) . ' jobs in ' . $countryName);
                $keywords->push('software developer jobs in ' . $countryName);
                $keywords->push('remote software jobs ' . $countryName);
            }
        }

        return [$seoTitle, $seoDescription, $keywords->unique()->take(25)->implode(', ')];
    }

    /**
     * schema.org JobPosting JSON-LD per open role — this, not the page's
     * meta tags, is what actually gets a listing into Google for Jobs /
     * country-specific job search results.
     */
    private function buildJobPostingSchema($jobs): array
    {
        return $jobs->map(function ($job) {
            $description = '<p>' . e($job->summary) . '</p>';

            if (!empty($job->responsibilities)) {
                $description .= '<p><strong>Responsibilities:</strong></p><ul>'
                    . collect($job->responsibilities)->map(fn ($i) => '<li>' . e($i) . '</li>')->implode('')
                    . '</ul>';
            }
            if (!empty($job->requirements)) {
                $description .= '<p><strong>Requirements:</strong></p><ul>'
                    . collect($job->requirements)->map(fn ($i) => '<li>' . e($i) . '</li>')->implode('')
                    . '</ul>';
            }
            if (!empty($job->nice_to_have)) {
                $description .= '<p><strong>Nice to have:</strong></p><ul>'
                    . collect($job->nice_to_have)->map(fn ($i) => '<li>' . e($i) . '</li>')->implode('')
                    . '</ul>';
            }

            $schema = [
                '@context'               => 'https://schema.org',
                '@type'                  => 'JobPosting',
                'title'                  => $job->title,
                'description'            => $description,
                'identifier'             => [
                    '@type' => 'PropertyValue',
                    'name'  => 'Kawach Technology',
                    'value' => (string) $job->id,
                ],
                'datePosted'             => $job->created_at->toDateString(),
                'validThrough'           => $job->application_deadline
                    ? $job->application_deadline->toDateString()
                    : $job->created_at->copy()->addDays(90)->toDateString(),
                'employmentType'         => self::EMPLOYMENT_TYPE_MAP[$job->type] ?? 'OTHER',
                'hiringOrganization'     => [
                    '@type' => 'Organization',
                    'name'  => 'Kawach Technology',
                    'sameAs' => url('/'),
                    'logo'  => asset('assets/images/kawach.png'),
                ],
                'jobLocationType'        => 'TELECOMMUTE',
                'directApply'            => true,
            ];

            $countries = collect($job->countries ?? [])
                ->map(fn ($c) => JobPosting::COUNTRIES[$c] ?? null)
                ->filter()
                ->values();

            if ($countries->isNotEmpty()) {
                $schema['applicantLocationRequirements'] = $countries
                    ->map(fn ($name) => ['@type' => 'Country', 'name' => $name])
                    ->all();
            }

            return $schema;
        })->all();
    }
}
