<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/about', 'pages.about');
Route::view('/contact', 'pages.contact');
Route::view('/jobs', 'pages.jobs-listing');
