<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Abstracts;
use App\Models\AtelierSaplfScp;
use App\Models\ComOraleValide;
use App\Models\Inscription;
use App\Models\PosterValide;
use App\Models\ScanPresence;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    function participation($id)
    {
        $inscription = Inscription::join('scan_presences', 'inscriptions.id', '=', 'scan_presences.invite_id')
            ->where('inscriptions.id', $id)
            ->first();
        if (empty($inscription)) {
            return back();
        }
        // $presence = ScanPresence::where("invite_id", $id)
        //                             ->whereBetween('created_at', ["2025-07-31 07:30:00", "2025-08-02 22:30:00"])
        //                             ->first();
        // if(empty($presence)){
        //     return "Nous sommes désolé de vous informer que vous ne pouvez pas télécharger de certificat de participation  au congrès de la SAPLF & SCP car vous n'étiez pas présent.";
        // }
        $pdf = PDF::loadView('certificat.certificat-participation', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.certificat-participation');
    }

    function participationAtelierEcho($id)
    {
        $atelierEcho = AtelierSaplfScp::where('atelier_pre_1', 'Oui')
            ->where('id', $id)
            ->where('confirmation_paiement', 1)
            ->first();
        if (empty($atelierEcho)) {
            return "Nous sommes désolé vous ne pouvez pas télécharger le certificat de participation car vous n'avez pas soldé l'inscription";
        }



        $pdf = PDF::loadView('certificat.certificat-atelier.atelier-echo', ['inscription' => $atelierEcho])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function participationAtelierSpiro($id)
    {
        $atelierEcho = AtelierSaplfScp::where('atelier_pre_2', 'Oui')
            ->where('id', $id)
            ->where('confirmation_paiement', 1)
            ->first();
        if (empty($atelierEcho)) {
            return "Nous sommes désolé vous ne pouvez pas télécharger le certificat de participation car vous n'avez pas soldé l'inscription";
        }


        $pdf = PDF::loadView('certificat.certificat-atelier.atelier-spirometrie', ['inscription' => $atelierEcho])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function moderateur($id)
    {

        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.certificat-moderateur', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function orateur($id)
    {

        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.certificat-orateur', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function poster($id)
    {
        $com = PosterValide::where('code', $id)->first();
        $abstract = Abstracts::where('email', $com->email)->first();
        $inscription = Inscription::where('email', $com->email)->first();
        $name = $abstract->name;
        if (!empty($inscription)) {
            $name = $inscription->titre . ' ' . mb_strtoupper($inscription->name) . ' ' . $inscription->prenom;
        }
        $pdf = PDF::loadView('certificat.certificat-poster', ['name' => $name, 'com' => $com])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.certificat-poster');
    }

    function orale($id)
    {
        $com = ComOraleValide::where('numero', $id)->first();
        if ($com->salle >= 1) {
            return "Nous sommes désolés car vous n'avez pas fait de présentation donc vous ne pouvez pas télécharger l'attestation de communication";
        }
        $abstract = Abstracts::where('email', $com->email)->first();
        $inscription = Inscription::where('email', $com->email)->first();
        $name = $abstract->name;
        if (!empty($inscription)) {
            $name = $inscription->titre . ' ' . mb_strtoupper($inscription->name) . ' ' . $inscription->prenom;
        }
        $pdf = PDF::loadView('certificat.certificat-communication', ['name' => $name, 'com' => $com])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function reference($id)
    {
        $abstract = Abstracts::find($id);
        $inscription = Inscription::where('email', $abstract->email)->first();
        $name = $abstract->name;
        if (!empty($inscription)) {
            $name = $inscription->titre . ' ' . mb_strtoupper($inscription->name) . ' ' . $inscription->prenom;
        }
        $pdf = PDF::loadView('certificat.certificat-reference', ['abstract' => $abstract, 'name' => $name])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function best($id)
    {
        $abstract = Abstracts::find($id);

        $pdf = PDF::loadView('certificat.certificat-best', ['abstract' => $abstract])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.certificat-best');
    }

    function bestPoster($id)
    {
        $abstract = Abstracts::find($id);

        $pdf = PDF::loadView('certificat.best-poster', ['abstract' => $abstract])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.certificat-best');
    }

    function firstChercheur($id)
    {
        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.first-chercheur', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.first-chercheur');
    }

    function secondChercheur($id)
    {
        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.second-chercheur', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.first-chercheur');
    }

    function thirdChercheur($id)
    {
        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.three-chercheur', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.first-chercheur');
    }

    function firstSpecialiste($id)
    {
        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.first-specialiste', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.first-chercheur');
    }

    function secondSpecialiste($id)
    {
        $inscription = Inscription::find($id);
        $pdf = PDF::loadView('certificat.second-specialiste', ['inscription' => $inscription])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
        //return view('certificat.first-chercheur');
    }
}
