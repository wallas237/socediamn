<?php

namespace App\Http\Controllers;

use App\Mail\EnvoiCertificatScpSaplf;
use App\Models\Inscription;
use App\Models\ServiceRendu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;

class ServiceRenduController extends Controller
{
    function ajouterAttestationService($id)
    {
        return view('service-rendu.ajouter-service', ['id' => $id]);
    }

    function addAjouteAttestationService($id, Request $request)
    {
        $request->validate([
            'certificat' => 'required',
            'libelle' => 'required'
        ]);
        $service = ServiceRendu::create([
            'certificat' => $request->certificat,
            'libelle' => $request->libelle,
            'inscription_id' => $id
        ]);
        return back()->with('status', "Les informations ont bien été enregistrées");
    }

    function visualisezServiceRendu($id)
    {
        $service = ServiceRendu::find($id);
        $inscription = Inscription::find($service->inscription_id);
        $libellePage = "service-rendu.certificat.atelier";
        if ($service->certificat == "table-ronde") {
            $libellePage = "service-rendu.certificat.table-ronde";
            //return strlen($service->libelle);
        } elseif ($service->certificat == "moderateur-session") {
            $libellePage = "service-rendu.certificat.moderateur-session";
        } elseif ($service->certificat == "moderateur-pleniere") {
            $libellePage = "service-rendu.certificat.moderateur-pleniere";
        } elseif ($service->certificat == "rapporteur-pleniere") {
            $libellePage = "service-rendu.certificat.rapporteur-pleniere";
        } elseif ($service->certificat == "rapporteur-session") {
            $libellePage = "service-rendu.certificat.rappoteur-session";
        } elseif ($service->certificat == "rapporteur-symposium") {
            $libellePage = "service-rendu.certificat.rappoteur-symposium";
        } elseif ($service->certificat == "moderateur-symposium") {
            $libellePage = "service-rendu.certificat.moderateur-symposium";
        }  elseif ($service->certificat == "moderateur-communication-affichée") {
            $libellePage = "service-rendu.certificat.communication-affichee";
        }else {
        }

        //return strlen($service->libelle);
        $pdf = PDF::loadView($libellePage, ['inscription' => $inscription, 'service' => $service])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    function envoiCertificatServiceRendu($id){
        $sessions = DB::table('service_rendus')
                                    ->join('inscriptions', 'service_rendus.inscription_id', '=', 'inscriptions.id')
                                    ->select('service_rendus.*', 'inscriptions.email', 'inscriptions.name', 'inscriptions.prenom')
                                    ->where('service_rendus.id', $id)
                                    ->first();

        $message = (new EnvoiCertificatScpSaplf($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($sessions->email)
            ->queue($message);
        return back();
    }
}
