<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BluLandingController;


Route::get('/', function () {
    return view('pages.index');
});
Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');
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

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');
Route::post('/schedule', [QuoteController::class, 'scheduleCall'])->name('schedule.store');

 