<?php

use App\Http\Controllers\JobPosts\JobPostController;
use Illuminate\Support\Facades\Route;

Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');

Route::middleware('auth')->group(function () {
    Route::get('/jobs/create', [JobPostController::class, 'create'])->name('jobs.create');
    Route::get('/jobs/my-posts', [JobPostController::class, 'myPosts'])->name('jobs.myPosts');
    Route::post('/jobs', [JobPostController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [JobPostController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [JobPostController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobPostController::class, 'destroy'])->name('jobs.destroy');
});

Route::get('/jobs/{job}', [JobPostController::class, 'show'])->name('jobs.show');
