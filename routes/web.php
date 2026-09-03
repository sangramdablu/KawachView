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
use App\Http\Controllers\CareerController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

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

Route::get('/services', [PagesController::class, 'showServices'])->name('services');
Route::get('/services/{slug}', [PagesController::class, 'showServiceDetails'])->name('pages.child.sevice_details');
Route::get('/case-studies', [PagesController::class, 'caseStudyIndex'])->name('casestudy');
Route::get('/case-studies/{slug}', [PagesController::class, 'showCasestudyDetails'])->name('case-studies.show');

Route::get('/hire-developer', [HireDeveloperController::class, 'index'])->name('hire-developer.index');
Route::get('/hire-developer/{slug}', [HireDeveloperController::class, 'show'])->name('hire-developer.show')->where('slug', '[a-z0-9\-]+');
Route::post('/hire-developer/{slug}', [HireDeveloperController::class, 'store'])->name('hire-developer.store')->where('slug', '[a-z0-9\-]+')->middleware('throttle:5,1');

Route::get('/careers', [CareerController::class, 'index'])->name('careers');
Route::post('/careers/apply', [CareerController::class, 'apply'])->name('careers.apply')->middleware('throttle:5,1');

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

