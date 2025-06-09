<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');;
Route::view('/about', 'pages.about')->name('about');;
Route::view('/contact', 'pages.contact')->name('contact');;
Route::view('/jobs', 'pages.jobs-listing')->name('jobs');;

//Login and Registration
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
