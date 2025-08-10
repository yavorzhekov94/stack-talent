<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/jobs', 'pages.jobs-listing')->name('jobs');

//Login and Registration
require __DIR__.'/auth.php';

//User profiles
require __DIR__.'/profile.php';

//Categories
require __DIR__.'/category.php';

//JObs
require __DIR__.'/job-posts.php';


