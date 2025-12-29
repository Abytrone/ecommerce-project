<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;

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
        Model::unguard();

        // Share first 4 categories for footer logic
        try {
            if (Schema::hasTable('categories')) {
                $footerCategories = \App\Models\Category::where('is_active', true)
                    ->take(4)
                    ->get();
                View::share('footerCategories', $footerCategories);
            }
        } catch (\Exception $e) {
            // Quietly fail if DB not ready (e.g. during migration)
        }
    }
}
