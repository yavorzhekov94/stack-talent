<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/category/create', [CategoryController::class, 'create'])
    ->middleware('auth')
    ->name('category.create');

Route::post('/category/store', [CategoryController::class, 'store'])
    ->middleware('auth')
    ->name('category.store');


