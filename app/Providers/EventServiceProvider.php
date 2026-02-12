<?php

namespace App\Providers;

use App\Events\EmailConfirmationAbstract;
use App\Events\EmailConfirmationInscription;
use App\Events\SendEmailAbstract;
use App\Events\SendEmailInscription;
use App\Listeners\EmailConfirmationAbstractListener;
use App\Listeners\EmailConfirmationInscriptionListener;
use App\Listeners\SendEmailAbstractListener;
use App\Listeners\SendEmailInscriptionListener;
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
            SendEmailVerificationNotification::class,
        ],
        
        SendEmailInscription::class => [
            SendEmailInscriptionListener::class,
        ],

        SendEmailAbstract::class => [
            SendEmailAbstractListener::class,
        ],

        EmailConfirmationInscription::class => [
            EmailConfirmationInscriptionListener::class,
        ],

        EmailConfirmationAbstract::class => [
            EmailConfirmationAbstractListener::class
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
