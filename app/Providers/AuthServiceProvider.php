<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\JobPost;
use App\Policies\CategoryPolicy;
use App\Policies\JobPostPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Category::class => CategoryPolicy::class,
        JobPost::class => JobPostPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
