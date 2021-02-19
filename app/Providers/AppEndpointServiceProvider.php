<?php

namespace App\Providers;

use App\AppEndpointCallback\Callback;
use Illuminate\Support\ServiceProvider;

class AppEndpointServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('appendpoint',function(){

            return new Callback();
    
    });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
