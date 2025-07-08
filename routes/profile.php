<?php

use App\Http\Controllers\Profiles\EmployeeProfileController;
use App\Http\Controllers\Profiles\EmployerProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('employee')->name('employee.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployeeProfileController::class, 'create'])->name('profile');
    Route::patch('/profile/basic', [EmployeeProfileController::class, 'updateBasic'])->name('profile.update.basic');
    Route::patch('/profile/details', [EmployeeProfileController::class, 'updateDetails'])->name('profile.update.details');
    Route::patch('/profile/password', [EmployeeProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Route::prefix('employer')->name('employer.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployerProfileController::class, 'create'])->name('profile');
    Route::post('/profile', [EmployerProfileController::class, 'store'])->name('profile.store');
});
