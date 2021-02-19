<?php

namespace App\Providers;

use App\MockApi\IosGoogleApi;
use Illuminate\Support\ServiceProvider;

class MockApiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('MockApi',function(){

            return new IosGoogleApi();
    
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
