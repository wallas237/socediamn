<?php

namespace App\Http\Controllers;

use App\Exports\ListePresenceAfaRespir;
use App\Mail\ConfirmationInscriptionAtelierAfaRespir;
use App\Mail\EnvoieCertificatParticipation;
use App\Models\InscriptionAtelierAfaRespir;
use

PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AtelierAfaRespir extends Controller
{

    function atelierPreInscriptionAfaRespir(){
        return view('atelier-afa.pre-inscription-afa');
    }

    function listeAtelierInscriptionAfaRespir(){
        return view('atelier-afa.inscription-valide-afa');
    }

    function confirmationInscriptionAfa($id){
        $update = InscriptionAtelierAfaRespir::where('id',$id)->update([
            'confirm_inscription'=>1
        ]);

        $inscriptionAfa = InscriptionAtelierAfaRespir::find($id);

         $message = (new ConfirmationInscriptionAtelierAfaRespir($inscriptionAfa))
                ->onQueue('confirm-emails-abstract');
            Mail::to($inscriptionAfa->email)
                ->queue($message);
        return back()->with('status', "L'inscription $inscriptionAfa->titre $inscriptionAfa->name a bien été validée ");

    }

     function inscriptionAtelierAfa()
    {

        return view('atelier-afa.inscription-afa-respir');
    }

    function badgeNonImprimer(){
        return view("atelier-afa.badge-non-imprimer");
    }


    function saveInscriptionAtelierAfa(Request $res)
    {


        $res->validate([
            'titre' => 'required',
            'name' => 'required',
            'email' => 'required|unique:inscription_atelier_afa_respirs',
            'qualite' => 'required'

        ]);
        session()->put('inscr', $res->titre . " " . $res->name . " votre pré-inscription  a déjà été enregistrée");
        session()->put('color', "ff6600fa");
        $inscriptionAtelierAfa = InscriptionAtelierAfaRespir::create([
            "titre" => $res->titre,
            "name" => $res->name,
            "prenom" => $res->prenom,
            "email" => $res->email,
            "qualite" => $res->qualite,
            "ville" => $res->ville,
            "pays" => $res->pays,

        ]);
        session()->put('inscr', $res->titre . " " . $res->name . " votre pré-inscription  a bien été enregistrée");
        session()->put('color', "225500fa");

        return back();
    }

    function listePresenceAfa(){
        return Excel::download(new ListePresenceAfaRespir, "participantatelierAfarespire.xlsx");
    }

    function envoiParticipation(){

    }

    function envoiCertificatParticipation(){
        $inscriptionAfa = InscriptionAtelierAfaRespir::where('confirm_inscription', 1)->where('certificat',0)->limit(10)->get();

        foreach($inscriptionAfa as $v){

            $message = (new EnvoieCertificatParticipation($v))
            ->onQueue('confirm-emails-abstract');
            Mail::to($v->email)->queue($message);
             $update = InscriptionAtelierAfaRespir::where('id',$v->id)->update([
            'certificat'=>1
        ]);

        }

        return back();
    }

    function afficherCertificationParticipationAfaRespir($id){
        $ins = InscriptionAtelierAfaRespir::find($id);
        $presence = DB::table('scan_afa_respires')->where('id_participant', $id)->first();
        if(empty($presence)){
            return "Nous sommes désolés vous ne pouvez pas télécharger d'attestation de participation car Vous n'avez pas assisté aux ateliers";
        }
         $pdf = PDF::loadView('atelier-afa.certificat-participation-afa-respir', ['inscription'=>$ins])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();

    }

    function attestationCommunication(){
        $com = ['titre'=>"Comment fonctionnent la VNI, la PPC et l’oxygénothérapie ?"];
        $name = "Dr POKA MAYAP Virginie";
          $pdf = PDF::loadView('atelier-afa.certificat-communication', ['com'=>$com, 'name'=>$name])
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }



}

