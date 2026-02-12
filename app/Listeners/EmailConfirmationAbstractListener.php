<?php

namespace App\Listeners;

use App\Events\EmailConfirmationAbstract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailConfirmationAbstractListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmailConfirmationAbstract  $event
     * @return void
     */
    public function handle(EmailConfirmationAbstract $event)
    {
        //
    }
}
