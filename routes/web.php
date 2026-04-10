<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});
Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');
Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');
Route::get('/services', function () {
    return view('pages.services');
})->name('services');
Route::get('/case-studies', function () {
    return view('pages.case-studies');
})->name('casestudy');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
