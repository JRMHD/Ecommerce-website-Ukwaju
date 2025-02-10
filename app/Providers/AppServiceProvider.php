<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Product;

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


    public function boot()
    {
        // Share categories across all views
        View::composer('*', function ($view) {
            $categories = Product::select('category')->distinct()->get();
            $view->with('categories', $categories);
        });
    }
}
