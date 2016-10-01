<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\CustomerObserver;
use App\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Customer::observe(CustomerObserver::class);
        // Customer::created(function ($customer) {
        //     dd($customer->toArray());
        // });
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
