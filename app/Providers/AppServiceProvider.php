<?php

namespace App\Providers;
use App\Models\Cart;

use Illuminate\Support\ServiceProvider;

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
    // public function boot(): void
    // {
        
    // }
    public function boot()
{
    // Share cart count across all views
    view()->composer('*', function ($view) {
        $cartCount = Cart::count(); // Get cart item count
        $view->with('cartCount', $cartCount);
    });
}
}
