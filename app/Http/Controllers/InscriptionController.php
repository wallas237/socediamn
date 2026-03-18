<?php

namespace App\Http\Controllers;

use App\Exports\ListePresence;
use App\Exports\ParticipantExcel;
use App\Mail\ConfirmationInscriptionAtelier;
use App\Mail\ConfirmInscription;
use App\Models\AtelierPayantVerification;
use App\Models\AtelierSaplfScp;
use App\Models\Grade;
use App\Models\Inscription;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
//INSERT INTO `membres` (`id`, `login`, `matricule_adherent`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'bid00030', 'ADRLESIM00030', 'fedelineazanguim@gmail.com', NULL, '$2y$12$fZ3HyndIhAEy2Tflx5HKmu2PooJVT3vBXp5G42XW6gMSh11kcteju', NULL, NULL, NULL)

class InscriptionController extends Controller
{
    //
    function index()
    {
        return view('inscription.liste-pre-inscription');
    }

    function listeInscription()
    {
        return view('inscription.liste-inscription');
    }

    function upadeParticipant($id)
    {

        return view('inscription.update-participant', ['id' => $id]);
    }

    function saveUpadeParticipant(Request $request, $id)
    {
        //return $id;
        $inscription = DB::table('inscriptions')
            ->where('id', $id)
            ->update([
                'titre' => $request->titre,
                'name' => $request->name,
                'prenom' => $request->prenom,
                'email' => $request->email
            ]);
        //return view('inscription.update-participant', ['id'=>$id]);
        return back();
    }

    function create()
    {

        return view('inscription.inscription');
    }

    function save(Request $request)
    {
        // return $id;
        $inscription = Inscription::create([
            'titre' => $request->titre,
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email
        ]);
        //return view('inscription.inscription', ['id'=>$id]);
        return back();
    }

    function listeExcelInscription()
    {
        return Excel::download(new ParticipantExcel, 'participant-inscrit.xlsx');
    }

    function listePresenceExcel()
    {
        return Excel::download(new ListePresence, 'listePresence.xlsx');
    }

    function confirmezInscription($id)
    {
        return view('inscription.payer-inscription', ['id' => $id]);
    }

    function saveConfirmezInscription(Request $request, $id)
    {
        $inscription = Inscription::find($id);
        // return $id;
        if ($inscription->confirmation_inscription == 0) {
            $updateInscription = Inscription::where('id', $id)->update([
                'confirmation_inscription' => 1,
                'montant' => $request->montant_inscription
            ]);

            //return $inscription;

            $message = (new ConfirmInscription($inscription));
            // ->onQueue('confirm-emails-abstract');
            //$inscription->email
            Mail::to($inscription->email)
                ->queue($message);
        }

        return back()->with('status', "L'inscription a bien été validé");
    }

    function atelierInscriptionScp()
    {
        return view('atelier-congres.inscription-atelier');
    }

    function listeAtelierInscription()
    {
        return view('atelier-congres.inscription-atelier-valide');
    }

    function confirmInscriptionAtelier($id)
    {
        $mot = '@';
        if (str_contains($id, $mot)) {
            $atelierInsc = Inscription::where('email', $id)->first();
            $atelierPayant = AtelierPayantVerification::create([
                "type" => "participant",
                "email" => $id,
                "participant" => $atelierInsc->id,
            ]);
            $message = (new ConfirmationInscriptionAtelier($atelierInsc))
                ->onQueue('confirm-emails-abstract');
            Mail::to($id)
                ->queue($message);
        } else {
            $updateAtelierScpSaplf = AtelierSaplfScp::where('id', $id)->update([
                'confirmation_paiement' => 1,
            ]);

            $atelierScpSaplf = AtelierSaplfScp::find($id);
            $atelierPayant = AtelierPayantVerification::create([
                "type" => "atelier",
                "email" => $atelierScpSaplf->email,
                "participant" => $id,
            ]);

            $message = (new ConfirmationInscriptionAtelier($atelierScpSaplf))
                ->onQueue('confirm-emails-abstract');
            Mail::to($atelierScpSaplf->email)
                ->queue($message);
        }



        return back()->with('status', "La confirmation de paiement a bien été enregistrée");
    }
    function badgeNonImprimer()
    {
        return view('inscription.liste-badge-non-imprimer');
    }

    function AtelierNonImprimer()
    {
        return view('atelier-congres.badge-non-imprimer');
    }
}
