<?php

namespace App\Providers;
use App\Models\Shop;
use App\Models\Category;
use App\Observers\ShopObserver;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;


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
        Voyager::useModel('Category', \App\Models\Category::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Shop::observe(ShopObserver::class);
        //Paginator::useBootstrap();


    }
}
