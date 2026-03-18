<?php

namespace App\Jobs;

use App\Mail\NoReply;
use App\Models\Evenement;
use App\Models\SmsSend;
use App\Services\SendSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EvenementSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public  $message;
    public $email;
    public $telephone;
    public $pays;
    public $entete;

    public function __construct($adherentInfos)
    {
        $this->message = $adherentInfos['message'];
        $this->email = $adherentInfos['email'];
        $this->telephone = $adherentInfos['telephone'];
        $this->pays = $adherentInfos['pays'];
        $this->entete = $adherentInfos['entete'];
    }

    /**
     * Execute the job.
     */
    public function handle(SendSms $sendSms): void
    {
        if($this->pays == "Cameroon"){
           $sendSms->sendHttp($this->message, $this->telephone);
        }

        $verificationEmail = explode('@', $this->email);
        if(count($verificationEmail)>1){
            Mail::to($this->email)->queue(new NoReply($this->entete, $this->message));
        }
        $message = SmsSend::create([
            'message'=>$this->message,
        ]);
    }
}
