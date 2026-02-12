<?php

namespace App\Listeners;

use App\Mail\AlertInscription;
use App\Events\SendEmailInscription;
use Illuminate\Support\Facades\Mail;
//use App\Mail\ConfirmationInscription;
use App\Mail\PreInscription;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailInscriptionListener implements ShouldQueue
{
    use InteractsWithQueue;

    public $afterCommit = true;
    public $stries = 5;
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
     * @param  \App\Events\SendEmailInscription  $event
     * @return void
     */
    public function handle(SendEmailInscription $event)
    {
        $name = $event->inscription['titre'].' '.$event->inscription['name'].' '.$event->inscription['prenom'];
        $alert = ['email'=>'wlunderwear237@gmail.com', 'id'=>$event->inscription['id'], 'mail'=>$event->inscription['email'], 'specialite'=>$event->inscription['specialite'], 'charge'=>$event->inscription['charge'], 'name'=>$name, 'phone'=>$event->inscription['telephone'], 'delegue'=>$event->inscription['delegue'], 'labo'=>$event->inscription['labo']];
        //Mail::to($alert['email'])->send(new AlertInscription($alert));
        Mail::to($event->inscription['mail'])->send(new PreInscription($alert));
        //dd($event->inscription['titre']);
    }
}
