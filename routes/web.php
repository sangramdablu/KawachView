<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/blog', [FrontBlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [FrontBlogController::class, 'show'])->name('blog.show')->where('slug', '[a-z0-9\-]+');
Route::post('/newsletter/subscribe', [FrontBlogController::class, 'newsletterSubscribe'])->name('newsletter.subscribe');


Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/about/founder', function () {
    return view('pages.founder.neha');
})->name('founder');

Route::get('/services', [PagesController::class, 'showServices'])->name('services');
Route::get('/services/{slug}', [PagesController::class, 'showServiceDetails'])->name('pages.child.sevice_details');
Route::get('/case-studies', [PagesController::class, 'caseStudyIndex'])->name('casestudy');
Route::get('/case-studies/{slug}', [PagesController::class, 'showCasestudyDetails'])->name('case-studies.show');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');
Route::post('/schedule', [QuoteController::class, 'scheduleCall'])->name('schedule.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
 
// throttle: max 5 submissions per minute per IP
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');

 