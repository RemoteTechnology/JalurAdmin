<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\UserEventService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserEventService::class, function () {
            return new UserEventService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
