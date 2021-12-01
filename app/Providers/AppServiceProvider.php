<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
            $categories=Category::all();
            view()->share('categories', $categories);

            $fonts=[
                ' ',
                'fas fa-tshirt',
                'fas fa-shopping-bag',
                'fas fa-home',
                'fas fa-car',
                'fas fa-mobile-alt',
                'fas fa-desktop',
                'fas fa-book',
                'fas fa-music',
                'fas fa-running',
                'fas fa-gamepad'
            ];
            view()->share('fonts', $fonts);
        
    }
}
