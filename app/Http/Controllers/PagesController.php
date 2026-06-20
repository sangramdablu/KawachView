<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageService;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function showServices()
    {
        $services = Page::with('service')
            ->published()
            ->byType('service')
            ->get();

        return view('pages.services', compact('services'));
    }

    public function showServiceDetails($slug)
    {
        $service = Cache::remember("service_detail_{$slug}", 3600, function () use ($slug) {
            return PageService::with([
                'page',
            ])
                ->whereHas('page', function ($query) use ($slug) {
                    $query->where('slug', $slug)
                        ->where('status', 'published');
                })
                ->firstOrFail();
        });

        $relatedServices = Cache::remember("related_services_{$slug}", 3600, function () use ($service) {
            return PageService::with('page')
                ->whereHas('page', function ($query) use ($service) {
                    $query->where('id', '!=', $service->page_id)
                        ->where('status', 'published');
                })->limit(3)->get();
        });
        
        $seoTitle = $service->page->meta_title ?? $service->page->title . ' | Kawach Technology';
        $seoDescription = $service->page->meta_description ?? $service->short_description;
        $seoKeywords = $service->page->meta_keywords ?? $service->page->title . ', software development, Kawach Technology';

        return view('pages.child.sevice_details', compact('service', 'relatedServices', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

    public function caseStudyIndex()
    {
        $caseStudies = Page::with(['caseStudy', 'category', 'author'])->published()->byType('casestudy')->latest('published_at')->orderBy('sort_order')->get();
        $featuredCase = $caseStudies->where('is_featured', true)->first() ?? $caseStudies->first();
        $categories = $caseStudies->pluck('category.name')->filter()->unique()->values();
        $stats = [
            'projects' => $caseStudies->count(),
            'industries' => $caseStudies->pluck('caseStudy.client_industry')->filter()->unique()->count(),
            'satisfaction' => 98,
        ];

        return view('pages.case-studies', compact('caseStudies', 'featuredCase', 'categories', 'stats'));
    }

    public function showCasestudyDetails($slug)
    {
        $caseStudy = Page::with(['caseStudy', 'category', 'author'])
            ->where('page_type', 'casestudy')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedCaseStudies = Page::with('caseStudy')
            ->where('page_type', 'casestudy')
            ->where('id', '!=', $caseStudy->id)
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $seoTitle       = $caseStudy->meta_title ?: $caseStudy->title . ' — Case Study | Kawach Technology';
        $seoDescription = $caseStudy->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($caseStudy->caseStudy->challenge ?? ''), 160);
        $seoKeywords    = $caseStudy->meta_keywords ?: trim(($caseStudy->focus_keyword ?? '') . ', ' . ($caseStudy->caseStudy->client_industry ?? '') . ', case study, Kawach Technology');

        return view('pages.child.case_study_details', compact('caseStudy', 'relatedCaseStudies', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

}
