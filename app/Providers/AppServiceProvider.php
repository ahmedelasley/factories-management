<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('currentLocale', LaravelLocalization::getCurrentLocale());
        view()->share('currentLocaleDirection', LaravelLocalization::getCurrentLocaleDirection());

    }
}
