<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
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
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle)
            ->prefix(LaravelLocalization::setLocale())
                ->middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']); // Add your custom middleware here
        });
    }
}
