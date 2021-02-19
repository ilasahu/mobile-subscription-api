<?php

namespace App\Providers;

use App\Events\PurchaseCanceled;
use App\Events\PurchaseExpired;
use App\Events\PurchaseRenewed;
use App\Events\PurchaseStarted;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PurchaseSuccessful;
use App\Listeners\SaveExpiryToDeviceTable;
use App\Events\SubscriptionToVerify;
use App\Listeners\CancelDeviceSubscription;
use App\Listeners\ChangeExpiryStatusToDeviceTable;
use App\Listeners\RenewDeviceSubscription;
use App\Listeners\StartDeviceSubscription;
use App\Listeners\VerifyActiveSubscription;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        PurchaseSuccessful::class => [
            SaveExpiryToDeviceTable::class,
        ],

        SubscriptionToVerify::class => [
            VerifyActiveSubscription::class,
        ],

        PurchaseExpired::class => [
            ChangeExpiryStatusToDeviceTable::class,
        ],

        
        PurchaseCanceled::class => [
            CancelDeviceSubscription::class,
        ],

        PurchaseRenewed::class => [
            RenewDeviceSubscription::class,
        ],

        PurchaseStarted::class => [
            StartDeviceSubscription::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
