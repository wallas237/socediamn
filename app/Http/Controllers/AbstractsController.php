<?php

namespace App\Http\Controllers;

use App\Exports\ExportAbstractExcel;
use App\Mail\AbstractRejete;
use PDF;
use App\Models\Abstracts;
use Illuminate\Http\Request;
use App\Mail\ConfirmationPoster;
use App\Mail\ConfirmationAbstract;
use App\Mail\ConfirmationConference;
use App\Mail\CorrectionOrale;
use App\Mail\CorrectionPoster;
use App\Mail\EnvoiCertificatCommunication;
use App\Mail\EnvoiConferenceCertificat;
use App\Mail\EnvoieCommunicationAffiche;
use App\Models\CommunicationSalle;
use App\Models\ComOraleValide;
use App\Models\PosterValide;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AbstractsController extends Controller
{
    function create()
    {
        return view('abstracts.liste-abstract');
    }

    function abstractValide()
    {
        return view('abstracts.liste-abstract-valide');
    }

    function listeConference(){
        return view('abstracts.conference.conference');
    }

    function listeValideConference(){
        return view('abstracts.conference.conference-valide');
    }

    function abstractPdf($id)
    {
        $get = DB::table('abstracts')->where('id', $id)->first();
        $pdf = PDF::loadView('abstracts.abstract-pdf', ['inscript' => $get])
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    function confirmAbstract($id)
    {
        $abstracts = DB::table('abstracts')->where('id', $id)->first();
        $message = (new ConfirmationAbstract($id))
            ->onQueue('confirm-emails-abstract');
        //"$abstracts->email"
        Mail::to($abstracts->email)
            ->queue($message);
        $abstract = Abstracts::where('id', $id)->update([
            'confirmation_abstract' => 1,
        ]);
        return back();
    }

    function envoyezCommunicationEmail()
    {
        $comValides = DB::table('com_orale_valides')->where('confirmation', 0)->limit(10)->get();
        $i = 0;
        foreach ($comValides as $comValide) {



            $message = (new ConfirmationAbstract($comValide->numero))
                ->onQueue('confirm-emails-abstract');

            Mail::to($comValide->email)
                ->queue($message);
            $abstract = ComOraleValide::where('numero', $comValide->numero)->update([
                'confirmation' => 1,
            ]);
        }

        return back();
    }

    function confirmPoster($id)
    {
        $resume = Abstracts::find($id);
        $message = (new ConfirmationPoster($id))
            ->onQueue('confirm-emails-abstract');
//$resume->email
        Mail::to($resume->email)
            ->queue($message);
        $abstract = Abstracts::where('id', $id)->update([
            'confirmation_abstract' => 1,
            'type_abstract' => "Poster"
        ]);
        return back();
    }

    function envoyezAfficheEmail()
    {
        $resumes = PosterValide::where('confirmation', 0)->limit(10)->get();
        foreach ($resumes as $resume) {
            $message = (new ConfirmationPoster($resume->code))
                ->onQueue('confirm-emails-abstract');
            //
            Mail::to($resume->email)
                ->queue($message);
            $abstract = PosterValide::where('code', $resume->code)->update([
                'confirmation' => 1
            ]);
        }

        return back();
    }

    function confirmConference($id)
    {

        $resume = Abstracts::find($id);
        $message = (new ConfirmationConference($id));
            //->onQueue('confirm-emails-abstract');
    //$resume->email
        Mail::to($resume->email)
            ->queue($message);
        $abstract = Abstracts::where('id', $id)->update([
            'confirmation_abstract' => 1,
            'type_abstract' => "Conference"
        ]);
        return back();
    }
    function correctionOrale($id)
    {
        $email = DB::table('abstracts')->where('id', $id)->first();
        $message = (new CorrectionOrale($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($email->email)
            ->queue($message);
        // $abstract = Abstracts::where('id', $id)->update([
        //     'confirmation_abstract' => 1,
        // ]);
        return back();
    }

    function correctionPoster($id)
    {
        $email = DB::table('abstracts')->where('id', $id)->first();
        $message = (new CorrectionPoster($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($email->email)
            ->queue($message);
        // $abstract = Abstracts::where('id', $id)->update([
        //     'confirmation_abstract' => 1,
        // ]);
        return back();
    }

    function rejeterAbstract($id)
    {
        $email = DB::table('abstracts')->where('id', $id)->first();
        $message = (new AbstractRejete($id));
           // ->onQueue('confirm-emails-abstract')
        //$email->email
        Mail::to($email->email)
            ->queue($message);
        $abstract = Abstracts::where('id', $id)->update([
            'confirmation_abstract' => 1,
            'type_abstract' => "Rejeté"]);
        return back();
    }

    function upadeAbstract($id)
    {
        return view('abstracts.update-abstract', ['id' => $id]);
    }

    function saveUpadeAbstract(Request $request, $id)
    {
        $abstract = DB::table('abstracts')
            ->where('id', $id)
            ->update([
                'civilite' => $request->civilite,
                'name' => $request->name,
                'email' => $request->email,
                'titre' => $request->titre
            ]);
        return back();
    }

    function ajouterSession()
    {
        return view('abstracts.ajouter-session');
    }

    function saveSession(Request $request)
    {
        $existe = DB::table('communication_salles')
            ->where('libelle_session', $request->libelle_session)
            ->where('date_heure', $request->date_heure)
            ->first();
        if (empty($existe)) {
            $CommunicationSalle = CommunicationSalle::create([
                'type'=>$request->type_name,
                'libelle_session' => $request->libelle_session,
                'date_heure' => $request->date_heure,
                'libelle_salle' => $request->libelle_salle,
                'date_fin' => $request->date_fin,
                'moderateur' => $request->moderateur
            ]);
        }


        return back();
    }

    function updateSession($id)
    {
        return view('abstracts.modifier-session', ['id' => $id]);
    }

    function saveUpdateSession(Request $request, $id)
    {
        $existe = DB::table('communication_salles')
            ->where('libelle_session', $request->libelle_session)
            ->where('date_heure', $request->date_heure)
            ->first();
        $verification = 0;
        if (empty($existe)) {
            $verification++;
        } else {
            if ($existe->id == $id) {
                $verification++;
            }
        }

        if ($verification > 0) {
            $CommunicationSalle = CommunicationSalle::where('id', $id)->update([
                'type'=>$request->type_name,
                'libelle_session' => $request->libelle_session,
                'date_heure' => $request->date_heure,
                'libelle_salle' => $request->libelle_salle,
                'date_fin' => $request->date_fin,
                'moderateur' => $request->moderateur
            ]);
        }

        return back();
    }

    function ajouterDetails($idSession)
    {

        return view('abstracts.ajouter-details-session', ['idSession' => $idSession]);
    }

    function saveDetails(Request $request, $idSession)
    {
        $existe = DB::table('ajouter_detail_sessions')
            ->where('libelle_detail_session', $request->libelle_detail_session)
            ->where('communication_salle_id', $request->communication_salle_id)
            ->first();
        if(empty($existe)){
            $details = DB::table('ajouter_detail_sessions')->insert([
                'libelle_detail_session' => $request->libelle_detail_session,
                'orateur' => $request->orateur,
                'libelle_salle' => $request->libelle_salle,
                'communication_salle_id' => $request->communication_salle_id
            ]);
        }

        return back();
        
    }

    
    function updateDetails($idDetails)
    {

        return view('abstracts.update-details-session', ['idDetails' => $idDetails]);
    }

    function saveUpdateDetails(Request $request, $idDetails)
    {
       
            $details = DB::table('ajouter_detail_sessions')->where('id', $idDetails)->update([
                'libelle_detail_session' => $request->libelle_detail_session,
                'orateur' => $request->orateur,
                'libelle_salle' => $request->libelle_salle,
                'communication_salle_id' => $request->communication_salle_id
            ]);
        

        return back();
        
    }

    function sendConferenceCertificat($id)
    {
        $abstract = Abstracts::find($id);
        $message = (new EnvoiConferenceCertificat($id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($abstract->email)
            ->queue($message);
        return back();
    }

    function sendCertificatCommunication($id)
    {
        $com = ComOraleValide::where('numero', $id)->first();
        //$abstract = Abstracts::where('email', $com->email)->first();
        $message = (new EnvoiCertificatCommunication($id))
            ->onQueue('confirm-emails-abstract');
        //
        Mail::to($com->email)
            ->queue($message);
        return back();
    }

    function sendCertificatPoster($id)
    {
        $com = PosterValide::where('code', $id)->first();
        //$abstract = Abstracts::where('email', $com->email)->first();
        $message = (new EnvoieCommunicationAffiche($id))
            ->onQueue('confirm-emails-abstract');
        //
        Mail::to($com->email)
            ->queue($message);
        return back();
    }

    function exporterAbstractExcel()
    {
        return Excel::download(new ExportAbstractExcel, 'liste-communications-validees.xlsx');
    }
}
