<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CompanyProfile;
use App\Models\Service;

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
        // Share company profile and product categories globally to all views
        View::composer('*', function ($view) {
            try {
                $profile = CompanyProfile::pluck('value', 'key')->toArray();
                $categories = Service::active()
                    ->whereNotNull('category')
                    ->distinct()
                    ->pluck('category')
                    ->toArray();
                $view->with(compact('profile', 'categories'));
            } catch (\Exception $e) {
                $view->with([
                    'profile' => [],
                    'categories' => [],
                ]);
            }
        });
    }
}

