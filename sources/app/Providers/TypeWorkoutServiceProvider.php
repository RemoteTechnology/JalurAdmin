<?php

namespace App\Providers;

use App\Http\Services\TypeWorkoutService;
use Illuminate\Support\ServiceProvider;

class TypeWorkoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TypeWorkoutService::class, function ($app) {
            return new TypeWorkoutService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
