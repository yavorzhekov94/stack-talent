<?php

use App\Http\Controllers\Profiles\EmployeeDocumentController;
use App\Http\Controllers\Profiles\EmployeeProfileController;
use App\Http\Controllers\Profiles\EmployerProfileController;
use App\Http\Controllers\Profiles\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::patch('/profile/basic', [ProfileController::class, 'updateBasic'])->name('profile.update.basic');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
});

Route::prefix('employee')->name('employee.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployeeProfileController::class, 'create'])->name('profile');
    Route::patch('/profile/details', [EmployeeProfileController::class, 'updateDetails'])->name('profile.update.details');
});

Route::prefix('employer')->name('employer.')->middleware('auth')->group(function () {
    Route::get('/profile', [EmployerProfileController::class, 'create'])->name('profile');
    Route::patch('/profile/details', [EmployerProfileController::class, 'updateDetails'])->name('profile.update.details');
});

//Documents
Route::middleware('auth')->group(function () {
    Route::get('/documents/{id}/download', [EmployeeDocumentController::class, 'download'])->name('documents.download');
    Route::get('/documents', [EmployeeDocumentController::class, 'index']);
    Route::post('/documents', [EmployeeDocumentController::class, 'store']);
    Route::delete('/documents/{id}', [EmployeeDocumentController::class, 'destroy']);
});
