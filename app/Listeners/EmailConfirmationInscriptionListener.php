<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationInscription;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\EmailConfirmationInscription;

class EmailConfirmationInscriptionListener implements ShouldQueue
{
    use InteractsWithQueue;
 
    public $afterCommit = true;
    public $tries = 5;
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
     * @param  \App\Events\EmailConfirmationInscription  $event
     * @return void
     */
    public function handle(EmailConfirmationInscription $event)
    {
        //
        //dd($event->data);
        Mail::to($event->data->email)->send(new ConfirmationInscription($event->data));

    }
}
