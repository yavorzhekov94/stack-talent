<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])
        ->name('login.store')
        ->middleware('throttle:5,1');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    //Google Auth
    Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])
        ->name('google.auth.redirect');
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])
        ->name('google.auth.callback');
    Route::get('/auth/google/select-user-type', [GoogleAuthController::class, 'showUserTypeForm'])
        ->name('auth.google.select-user-type');
    Route::post('/auth/google/complete-registration', [GoogleAuthController::class, 'completeRegistration'])
        ->name('auth.google.complete-registration');

    //Forgot and Reset password
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('forgot-password.create');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('forgot-password.store');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');

});

Route::delete('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
