<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\FrontNewsController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\HireDeveloperController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\VisitorTrackController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::post('/visitor-track/ping', [VisitorTrackController::class, 'ping'])
    ->name('visitor-track.ping')
    ->middleware('throttle:60,1');

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/blog', [FrontBlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [FrontBlogController::class, 'show'])->name('blog.show')->where('slug', '[a-z0-9\-]+');
Route::post('/blog/{slug}/like', [FrontBlogController::class, 'toggleLike'])->name('blog.like')->where('slug', '[a-z0-9\-]+')->middleware('throttle:20,1');
Route::post('/blog/{slug}/comment', [FrontBlogController::class, 'storeComment'])->name('blog.comment.store')->where('slug', '[a-z0-9\-]+')->middleware('throttle:5,1');
Route::post('/newsletter/subscribe', [FrontBlogController::class, 'newsletterSubscribe'])->name('newsletter.subscribe')->middleware('throttle:5,1');

Route::get('/newsroom', [FrontNewsController::class, 'index'])->name('newsroom');
Route::get('/newsroom/{slug}', [FrontNewsController::class, 'show'])->name('newsroom.show')->where('slug', '[a-z0-9\-]+');


Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/about/founder', function () {
    return view('pages.founder.neha');
})->name('founder');

Route::get('/markets', function () {
    return view('pages.markets');
})->name('markets');

Route::get('/markets/usa/software-development', function () {
    return view('pages.countrypages.usa');
})->name('country.usa');

Route::get('/markets/uk/software-development', function () {
    return view('pages.countrypages.uk');
})->name('country.uk');

Route::get('/markets/germany/software-development', function () {
    return view('pages.countrypages.germany');
})->name('country.germany');

Route::get('/markets/europe/software-development', function () {
    return view('pages.countrypages.europe');
})->name('country.europe');

Route::get('/products/orbit', function () {
    return view('pages.products.orbit');
})->name('products.orbit');

/*
|--------------------------------------------------------------------------
| Legacy service URL redirects
|--------------------------------------------------------------------------
| Old indexed slugs that have since been renamed — 301 so search engines
| transfer ranking signal to the new URL instead of hitting a 404. Must be
| declared before the /services/{slug} wildcard route below.
|--------------------------------------------------------------------------
*/
Route::permanentRedirect(
    '/services/custom-software-development-services-for-businesses',
    '/services/custom-software-development'
);

/*
| SEO PHASE 18/31 — kawach-provides-api-development-services duplicated
| custom-api-development-integration-solutions (same search intent,
| keyword cannibalization). Set to draft in the DB and 301'd here so any
| existing inbound links/ranking signal transfers to the canonical page.
*/
Route::permanentRedirect(
    '/services/kawach-provides-api-development-services',
    '/services/custom-api-development-integration-solutions'
);

Route::get('/services', [PagesController::class, 'showServices'])->name('services');

/*
| SEO PHASE 5 — the flagship custom-software-development page gets its own
| bespoke template/route, registered before the generic /services/{slug}
| wildcard so it takes precedence for this one slug.
*/
Route::get('/services/custom-software-development', [PagesController::class, 'customSoftwareDevelopment'])->name('services.custom-software-development');

Route::get('/services/{slug}', [PagesController::class, 'showServiceDetails'])->name('pages.child.sevice_details');
Route::get('/case-studies', [PagesController::class, 'caseStudyIndex'])->name('casestudy');
Route::get('/case-studies/{slug}', [PagesController::class, 'showCasestudyDetails'])->name('case-studies.show');

Route::get('/team', [PagesController::class, 'teamIndex'])->name('team');

/*
| SEO PHASE 16 — industry pages, config-driven catalogue (see
| config/industries.php) following the same pattern as hire-developer.
*/
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show')->where('slug', '[a-z0-9\-]+');

Route::get('/hire-developer', [HireDeveloperController::class, 'index'])->name('hire-developer.index');
Route::get('/hire-developer/{slug}', [HireDeveloperController::class, 'show'])->name('hire-developer.show')->where('slug', '[a-z0-9\-]+');
Route::post('/hire-developer/{slug}', [HireDeveloperController::class, 'store'])->name('hire-developer.store')->where('slug', '[a-z0-9\-]+')->middleware('throttle:5,1');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::post('/careers/apply', [CareerController::class, 'apply'])->name('careers.apply')->middleware('throttle:5,1');
Route::get('/careers/applications/{application}/resume', [CareerController::class, 'downloadResume'])
    ->name('careers.applications.resume')
    ->middleware('throttle:30,1');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::post('/schedule', [QuoteController::class, 'scheduleCall'])->name('schedule.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// throttle: max 5 submissions per minute per IP
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-conditions', function () {
    return view('pages.terms-conditions');
})->name('terms');

Route::get('/cookie-policy', function () {
    return view('pages.cookie-policy');
})->name('cookie-policy');

Route::get('/refund-policy', function () {
    return view('pages.refund-policy');
})->name('refund-policy');

