<?php

namespace App\Providers;

use App\Models\Catalog;
use App\Models\City;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;


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
        View::share('cities', City::all());

        View::composer('*', function ($view) {
            $view->with('currentCity', request()->route('city'));
        });
        View::share('catalogs', Catalog::all());

    }
}
