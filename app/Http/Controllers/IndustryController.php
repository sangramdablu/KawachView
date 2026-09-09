<?php

namespace App\Http\Controllers;

use App\Models\Page;

class IndustryController extends Controller
{
    public function show(string $slug)
    {
        $catalogue = config('industries');

        abort_unless(isset($catalogue[$slug]), 404);

        $industry = array_merge($catalogue[$slug], ['slug' => $slug]);

        $caseStudy = Page::with('caseStudy')
            ->where('slug', $industry['case_study'])
            ->where('status', 'published')
            ->first();

        $relatedServices = Page::with('service')
            ->whereIn('slug', $industry['related_services'])
            ->where('status', 'published')
            ->get()
            ->sortBy(fn ($p) => array_search($p->slug, $industry['related_services']))
            ->values();

        $otherIndustries = collect($catalogue)
            ->map(fn ($data, $s) => array_merge($data, ['slug' => $s]))
            ->reject(fn ($d) => $d['slug'] === $slug)
            ->values();

        $seoTitle       = $industry['meta_title'];
        $seoDescription = $industry['meta_description'];
        $seoCanonical   = url('/industries/' . $slug);

        return view('pages.child.industry_details', compact(
            'industry', 'caseStudy', 'relatedServices', 'otherIndustries',
            'seoTitle', 'seoDescription', 'seoCanonical'
        ));
    }
}
