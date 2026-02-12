<?php

namespace App\Listeners;

use App\Mail\AlertAbstract;
use App\Mail\ConfirmAbstract;
use App\Events\SendEmailAbstract;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailAbstractListener implements ShouldQueue
{
    use InteractsWithQueue;

    public $tries = 5;
    public $afterCommit = true;
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
     * @param  \App\Events\SendEmailAbstract  $event
     * @return void
     */
    public function handle(SendEmailAbstract $event)
    {
        //
        // dd($event->abstract['email']);
        $mail = $event->abstract['email'];
        Mail::to('sodiamn@gmail.com')->send(new AlertAbstract($event->abstract));
        Mail::to($mail)->send(new ConfirmAbstract($event->abstract));
    }
}
