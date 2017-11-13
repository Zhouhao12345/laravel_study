<?php

namespace App\Providers;

use App\Models\UserPartner;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    // Delay to load this service provider, no need to reload it
    // for each request
    // protected $defer = true;

    public function boot()
    {
        // Register observer for specific model
//        UserPartner::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
