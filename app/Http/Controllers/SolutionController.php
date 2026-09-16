<?php

namespace App\Http\Controllers;

use App\Models\Page;

class SolutionController extends Controller
{
    public function show(string $slug)
    {
        $catalogue = config('solutions');

        abort_unless(isset($catalogue[$slug]), 404);

        $solution = array_merge($catalogue[$slug], ['slug' => $slug]);

        $caseStudy = Page::with('caseStudy')
            ->where('slug', $solution['case_study'])
            ->where('status', 'published')
            ->first();

        $relatedServices = Page::with('service')
            ->whereIn('slug', $solution['related_services'])
            ->where('status', 'published')
            ->get()
            ->sortBy(fn ($p) => array_search($p->slug, $solution['related_services']))
            ->values();

        $otherSolutions = collect($catalogue)
            ->map(fn ($data, $s) => array_merge($data, ['slug' => $s]))
            ->reject(fn ($d) => $d['slug'] === $slug)
            ->values();

        $seoTitle       = $solution['meta_title'];
        $seoDescription = $solution['meta_description'];
        $seoCanonical   = url('/solutions/' . $slug);

        return view('pages.child.solution_details', compact(
            'solution', 'caseStudy', 'relatedServices', 'otherSolutions',
            'seoTitle', 'seoDescription', 'seoCanonical'
        ));
    }
}
