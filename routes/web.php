<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');;
Route::view('/about', 'pages.about')->name('about');;
Route::view('/contact', 'pages.contact')->name('contact');;
Route::view('/jobs', 'pages.jobs-listing')->name('jobs');;

//Login and Registration
Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])
        ->name('login.store')
        ->middleware('throttle:5,1');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});
Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
