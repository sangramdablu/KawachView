<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageService;
use App\Models\User;
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

    /**
     * SEO PHASE 5 — the flagship /services/custom-software-development
     * landing page. Bespoke template (not the generic sevice_details
     * view every other service page uses) because its required structure
     * — dedicated startup/small-business/solutions sections, two distinct
     * CTAs — doesn't fit the shared Overview/Features/Process layout.
     * Still reads meta tags from the CMS row (id 12) so Phases 2-4's
     * work stays the single source of truth for title/description.
     */
    public function customSoftwareDevelopment()
    {
        $page = Page::with('service')
            ->where('slug', 'custom-software-development')
            ->where('status', 'published')
            ->firstOrFail();

        $seoTitle       = $page->meta_title ?? 'Custom Software Development Company | Kawach Technology';
        $seoDescription = $page->meta_description ?? $page->service->short_description;
        $seoKeywords    = $page->meta_keywords ?? 'custom software development, custom software development company';
        $seoCanonical   = url('/services/custom-software-development');

        return view('pages.child.custom_software_development', compact(
            'page', 'seoTitle', 'seoDescription', 'seoKeywords', 'seoCanonical'
        ));
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

        // SEO Phase 12: prefer other case studies in the same industry
        // ("related industry" linking) before falling back to the latest
        // others, instead of always showing an unfiltered "latest 3".
        $industry = $caseStudy->caseStudy->client_industry ?? null;
        $baseQuery = fn () => Page::with('caseStudy')
            ->where('page_type', 'casestudy')
            ->where('id', '!=', $caseStudy->id)
            ->where('status', 'published');

        $relatedCaseStudies = collect();
        if ($industry) {
            $relatedCaseStudies = $baseQuery()
                ->whereHas('caseStudy', fn ($q) => $q->where('client_industry', $industry))
                ->latest()
                ->take(3)
                ->get();
        }
        if ($relatedCaseStudies->count() < 3) {
            $fill = $baseQuery()
                ->whereNotIn('id', $relatedCaseStudies->pluck('id'))
                ->latest()
                ->take(3 - $relatedCaseStudies->count())
                ->get();
            $relatedCaseStudies = $relatedCaseStudies->merge($fill);
        }

        $relatedServiceSlug = $this->relatedServiceSlugFor($caseStudy);
        $relatedServiceName = [
            'erp-development' => 'ERP Development',
            'crm-development' => 'CRM Development',
            'software-modernization' => 'Software Modernization',
            'enterprise-software-development' => 'Enterprise Software Development',
            'ai-machine-learning-development' => 'AI & Machine Learning Development',
            'saas-development' => 'SaaS Development',
            'mobile-app-development' => 'Mobile App Development',
            'custom-api-development-integration-solutions' => 'API Development & Integration',
            'web-application-development' => 'Web Application Development',
            'custom-software-development' => 'Custom Software Development',
        ][$relatedServiceSlug] ?? 'Custom Software Development';

        $relatedIndustrySlug = $this->relatedIndustrySlugFor($caseStudy);
        $relatedIndustryName = $relatedIndustrySlug ? (config('industries')[$relatedIndustrySlug]['title'] ?? null) : null;

        $seoTitle       = $caseStudy->meta_title ?: $caseStudy->title . ' — Case Study | Kawach Technology';
        $seoDescription = $caseStudy->meta_description ?: \Illuminate\Support\Str::limit(strip_tags($caseStudy->caseStudy->challenge ?? ''), 160);
        $seoKeywords    = $caseStudy->meta_keywords ?: trim(($caseStudy->focus_keyword ?? '') . ', ' . ($caseStudy->caseStudy->client_industry ?? '') . ', case study, Kawach Technology');

        return view('pages.child.case_study_details', compact('caseStudy', 'relatedCaseStudies', 'relatedServiceSlug', 'relatedServiceName', 'relatedIndustrySlug', 'relatedIndustryName', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

    /**
     * SEO Phase 17 (Case Study → Service → Industry → Market → Contact linking) —
     * matches a case study's free-text client_industry to one of the 6 built
     * industry pages (config/industries.php). Returns null rather than a wrong
     * guess when the case study's industry has no dedicated page yet (e.g.
     * Real Estate, Hospitality, Insurance) — never link to something that
     * doesn't exist or misrepresent the case study's actual industry.
     */
    private function relatedIndustrySlugFor(Page $caseStudy): ?string
    {
        $industryText = strtolower($caseStudy->caseStudy->client_industry ?? '');
        if ($industryText === '') {
            return null;
        }

        $keywordMap = [
            'health' => 'healthcare-software-development',
            'fintech' => 'fintech-software-development',
            'lending' => 'fintech-software-development',
            'financial' => 'fintech-software-development',
            'manufactur' => 'manufacturing-software-development',
            'logistics' => 'logistics-software-development',
            'supply chain' => 'logistics-software-development',
            'retail' => 'retail-software-development',
            'e-commerce' => 'retail-software-development',
            'ecommerce' => 'retail-software-development',
            'education' => 'education-software-development',
        ];

        foreach ($keywordMap as $keyword => $slug) {
            if (str_contains($industryText, $keyword)) {
                return isset(config('industries')[$slug]) ? $slug : null;
            }
        }

        return null;
    }

    /**
     * SEO Phase 12 ("related service" linking) — matches a case study to
     * whichever real, published service page its own content actually
     * points to, instead of hardcoding a link to custom-software-development
     * for every case study regardless of what it's about. Falls back to
     * custom-software-development if nothing matches or the matched page
     * isn't actually published (never link to something that doesn't exist).
     */
    private function relatedServiceSlugFor(Page $caseStudy): string
    {
        $haystack = strtolower(trim(
            $caseStudy->title . ' ' .
            ($caseStudy->caseStudy->client_industry ?? '') . ' ' .
            strip_tags($caseStudy->caseStudy->challenge ?? '')
        ));

        $keywordMap = [
            'erp' => 'erp-development',
            'case management' => 'crm-development',
            'crm' => 'crm-development',
            'legacy' => 'software-modernization',
            'modernizing' => 'software-modernization',
            'industrial iot' => 'enterprise-software-development',
            'predictive maintenance' => 'enterprise-software-development',
            'insurance' => 'enterprise-software-development',
            'machine learning' => 'ai-machine-learning-development',
            ' ai ' => 'ai-machine-learning-development',
            'automation' => 'ai-machine-learning-development',
            'saas' => 'saas-development',
            'platform' => 'saas-development',
            'mobile' => 'mobile-app-development',
            'api' => 'custom-api-development-integration-solutions',
            'integration' => 'custom-api-development-integration-solutions',
            'publishing' => 'web-application-development',
            'cms' => 'web-application-development',
        ];

        $fallback = 'custom-software-development';

        foreach ($keywordMap as $keyword => $slug) {
            if (str_contains($haystack, $keyword)) {
                $exists = Page::where('slug', $slug)->where('status', 'published')->exists();
                return $exists ? $slug : $fallback;
            }
        }

        return $fallback;
    }

    public function teamIndex()
    {
        $teamMembers = User::where('is_team_member', true)
            ->get()
            ->sortBy([
                fn ($a, $b) => $a->leadership_rank <=> $b->leadership_rank,
                fn ($a, $b) => $a->name <=> $b->name,
            ])
            ->values();

        return view('pages.team', compact('teamMembers'));
    }

}
