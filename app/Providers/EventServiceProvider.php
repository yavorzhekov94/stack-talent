<?php

namespace App\Providers;

use App\Events\UserProfileCreated;
use App\Events\UserRegistered;
use App\Listeners\CreateUserProfile;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserRegistered::class => [
            SendWelcomeEmail::class,
        ],
        UserProfileCreated::class => [
            CreateUserProfile::class,
        ]
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
