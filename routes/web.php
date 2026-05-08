<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontBlogController;


Route::get('/', function () {
    return view('pages.index');
});

Route::get('/blog', [FrontBlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [FrontBlogController::class, 'show'])->name('blog.show')->where('slug', '[a-z0-9\-]+');
Route::post('/newsletter/subscribe', [FrontBlogController::class, 'newsletterSubscribe'])->name('newsletter.subscribe');


Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');
Route::get('/case-studies', function () {
    return view('pages.case-studies');
})->name('casestudy');
Route::get('/contact', function () {
    return view('pages.contact');   
})->name('contact');
 
Route::get('/services', [PagesController::class, 'showServices'])->name('services');
Route::get('/services/{slug}', [PagesController::class, 'showServiceDetails'])->name('pages.child.sevice_details');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/schedule', [QuoteController::class, 'scheduleCall'])->name('schedule.store');

 