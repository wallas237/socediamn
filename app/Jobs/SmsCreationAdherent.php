<?php

namespace App\Jobs;

use App\Models\Adherent;
use App\Services\SendSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SmsCreationAdherent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public Adherent $adherent;
    public SendSms $sendSms;
    public function __construct(Adherent $adherent)
    {
        $this->adherent = $adherent;
        
    }

    /**
     * Execute the job.
     */
    public function handle(SendSms $sendSms): void
    {
        // <p style=" margin: 0px 40px;padding-bottom: 25px;line-height: 2; font-size: 15px;">
        //                         Login : {{ $adherent->username }}<br>
        //                         password : {{ 'DRlesim2024' }}<br>
        //                     </p>
        $message = "Hello ".ucfirst($this->adherent->nom)."\n";
        $message .= "Bienvenue dans notre équipe\n";
        $message .= "Trouvez ci-dessous vos identifiants";
        $message .= "\n Login: ".$this->adherent->username;
        $message .= "\n Password : DRlesim2024";
        $message .= "\n <a href='https://drlesimgroup.com/membre-login'>Login</a>";
        $telephone = $this->adherent->indicatif_pays;
        $sendSms->sendHttp($message, $telephone);
    }
}
