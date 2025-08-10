<?php

use App\Http\Controllers\JobPosts\JobPostController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobPostController::class, 'create'])->name('jobs.create');
});
