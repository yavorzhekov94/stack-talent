<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/jobs', 'pages.jobs-listing')->name('jobs');

//Login and Registration
require __DIR__.'/auth.php';

//User profiles
require __DIR__.'/profile.php';


