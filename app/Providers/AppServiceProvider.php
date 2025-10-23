<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Share categories with all views
        View::composer('*', function ($view) {
            $categories = Category::all();
            $cart = session()->get('cart', []);
            $cartCount = array_sum(array_column($cart, 'quantity'));
            
            $view->with([
                'categories' => $categories,
                'cartCount' => $cartCount
            ]);
        });
    }
}