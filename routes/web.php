<?php

use App\Http\Controllers\Profiles\EmployeeProfileController;
use App\Http\Controllers\Profiles\EmployerProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/jobs', 'pages.jobs-listing')->name('jobs');

//User profiles
Route::prefix('employee')->name('employee.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployeeProfileController::class, 'create'])->name('profile');
    Route::patch('/profile/basic', [EmployeeProfileController::class, 'updateBasic'])->name('profile.update.basic');
});

Route::prefix('employer')->name('employer.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployerProfileController::class, 'create'])->name('profile');
    Route::post('/profile', [EmployerProfileController::class, 'store'])->name('profile.store');
});

//Login and Registration
require __DIR__.'/auth.php';


