<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

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
        Paginator::useBootstrapFive();
        \view()->composer('home' , function($view){
            $products = count(DB::table('products')->get());
            $stores = count(DB::table('stores')->get());
            $cabins = \count(DB::table('cabins')->get());
            $view->with([
                'products' => $products,
                'stores' => $stores,
                'cabins' => $cabins
            ]);
        });
    }
}
