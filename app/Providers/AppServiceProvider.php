<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
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
        View::composer('*', function ($view) {
            // Get unique categories
            $categories = Product::select('category')->distinct()->get();

            // Get wishlist count from session
            $wishlistCount = count(Session::get('wishlist', []));

            // Share data with all views
            $view->with([
                'categories' => $categories,
                'wishlistCount' => $wishlistCount
            ]);
        });
    }
}
