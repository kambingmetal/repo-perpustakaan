<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\ProfileCompanyComposer;
use App\View\Composers\SettingPageComposer;
use App\Services\VisitorStatsService;

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
        // Register ProfileCompany view composer for all views
        View::composer('*', ProfileCompanyComposer::class);
        
        // Share visitor stats globally to all views
        View::share('visitorStats', app(VisitorStatsService::class)->getStats());
    }
}
