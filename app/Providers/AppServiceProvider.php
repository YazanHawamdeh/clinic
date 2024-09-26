<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
        $userId = Auth::id();
        
        $cartCount = Cart::where('user_id', $userId)->count();
         $view->with('cartCount', $cartCount);}
         else return response()->json(['cartCount' => 0]);
    });
}

// public function getCartCount()
// {
//     if (Auth::check()) {
//         $userId = Auth::id();
        
//         $cartCount = Cart::where('user_id', $userId)->count();

//         return response()->json(['cartCount' => $cartCount]);
//     } else {
//         return response()->json(['cartCount' => 0]);
//     }
// }
}
