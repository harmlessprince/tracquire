<?php

namespace App\Providers;

use App\Events\CreditUserWalletEvent;
use App\Events\SignupEvent;
use App\Listeners\CreditUserWalletListener;
use App\Listeners\SendEmailVerificationListener;
use App\Listeners\SignupListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
//            SendEmailVerificationNotification::class,
        ],
        CreditUserWalletEvent::class => [
            CreditUserWalletListener::class
        ],
        SignupEvent::class => [
            SignupListener::class,
            SendEmailVerificationListener::class
        ]
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
