<?php

namespace App\Http\Controllers;

use App\Mail\AttestationParticipationAtelierCongres;
use App\Mail\EnvoiCertificatCommunication;
use App\Mail\EnvoiConferenceCertificat;
use App\Mail\EnvoieCommunicationAffiche;
use App\Mail\SendCertificatParticipation;
use App\Models\Abstracts;
use App\Models\AtelierSaplfScp;
use App\Models\ComOraleValide;
use App\Models\Inscription;
use App\Models\PosterValide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendCertificatCongres extends Controller
{
    function sendCongresParticipate($id)
    {
        $insciption = Inscription::find($id);
        $message = (new SendCertificatParticipation($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($insciption->email)
            ->queue($message);
        return back();
    }

    function sendAtelierParticipate($id)
    {
        $atelier = AtelierSaplfScp::find($id);

        $message = (new AttestationParticipationAtelierCongres($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($atelier->email)
            ->queue($message);
        return back();
    }


    function sendAtelierAllParticipate()
    {
        $ateliers = AtelierSaplfScp::where('confirmation_paiement', 1)
            ->where('certificat', 0)
            ->limit(20)
            ->get();

        foreach ($ateliers as $atelier) {
            $message = (new AttestationParticipationAtelierCongres($atelier->id))
                ->onQueue('send-atelier-participate');

            Mail::to($atelier->email)
                ->queue($message);
            $update = AtelierSaplfScp::where('id', $atelier->id)
                ->update([
                    'certificat' => 1
                ]);
        }

        return back()->with('status', 'Les Certificats de participations aux ateliers ont été envoyées');
    }

    function sendCertificatAllParticipation()
    {
        $inscriptions = Inscription::where('confirmation_attestion', 0)
            ->join('scan_presences', 'inscriptions.id', '=', 'scan_presences.invite_id')
            ->limit(20)
            ->get();
        
        foreach ($inscriptions as $inscription) {

            $message = (new SendCertificatParticipation($inscription->id))
                ->onQueue('send-participate-attestation');

            Mail::to($inscription->email)
                ->queue($message);

            $udpadate = Inscription::where('id', $inscription->id)
                ->update([
                    'confirmation_attestion' => 1
                ]);
        }

        return back()->with('status', 'Les Certificats de participations au congrès ont été envoyées');
    }

    function sendOraleCertificate()
    {
        $coms = ComOraleValide::where('confirmation_attestion', 0)->limit(20)->get();
        //$abstract = Abstracts::where('email', $com->email)->first();
        foreach ($coms as $com) {
            $message = (new EnvoiCertificatCommunication($com->numero))
                ->onQueue('confirm-emails-abstract');
            //
            Mail::to($com->email)
                ->queue($message);
            $update = ComOraleValide::where('numero', $com->numero)
                ->update([
                    "confirmation_attestion" => 1
                ]);
        }

        return back()->with('status', 'Les Certificats de communications orales au congrès ont été envoyées');
    }

    function sendAfficheCertificate()
    {
        $coms = PosterValide::where('confirmation_attestion', 0)->limit(20)->get();
        //$abstract = Abstracts::where('email', $com->email)->first();
        foreach ($coms as $com) {
            $message = (new EnvoieCommunicationAffiche($com->code))
                ->onQueue('confirm-emails-abstract');
            //
            Mail::to($com->email)
                ->queue($message);
            $update = PosterValide::where('code', $com->code)
                ->update([
                    "confirmation_attestion" => 1
                ]);
        }

        return back()->with('status', 'Les Certificats de communications affichées au congrès ont été envoyées');
    }

    function sendConferenceCertificate()
    {
        $conferences = Abstracts::where('confirmation_attestion', 0)
            ->where('type_abstract', 'Conférence')
            ->limit(20)
            ->get();
        foreach ($conferences as $conference) {

            $message = (new EnvoiConferenceCertificat($conference->id))
                ->onQueue('confirm-emails-abstract');
            Mail::to($conference->email)
                ->queue($message);
            $update = Abstracts::where('id', $conference->id)
                ->update([
                    'confirmation_attestion' => 1
                ]);
        }

        return back()->with('status', 'Les Certificats de conference au congrès ont été envoyées');
    }



    function sendModeration($id) {}
}
