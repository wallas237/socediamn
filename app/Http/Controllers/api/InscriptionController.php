<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\PreInscription;
use App\Models\Grade;
use App\Models\Inscription;
use App\Models\Laboratoire;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    function saveInscription(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|unique:inscriptions,email',
                'telephone' => 'required|unique:inscriptions,telephone'
            ]);
            $inscription = Inscription::create([
                'titre' => $request->civilite,
                'name' => $request->first_name,
                'prenom' => $request->last_name,
                'email' => $request->email,
                'pays' => $request->country,
                'telephone' => $request->telephone,
                'grade' => $request->grade,
                'specialite' => $request->participant_category,
                'labo' => $request->laboratoire,
                'charge' => $request->laboratoire > 0 ?  "Oui" : "Non",

            ]);
            $nom = $request->civilite . " " . $request->first_name;
            $alert = ['id' => $inscription->id, 'email' => $request->email, 'charge' => $inscription->charge, 'name' => $nom, 'labo' => $request->laboratoire, 'specialite' => $request->participant_category];

            Mail::to($alert['email'])->send(new PreInscription($alert));
            //      $message = (new PreInscription($inscription))
            //     ->onQueue('emails');

            // Mail::to($inscription->email)
            //     ->queue($message);
            return response()->json([
                "statusText" => "$nom votre inscription a été enregistrée avec succès!",
                "ok" => true,
                "status" => 201
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if (isset($e->validator->errors()->get('email')[0]) || isset($e->validator->errors()->get('telephone')[0])) {
                if (isset($e->validator->errors()->get('email')[0])) {
                    return response()->json(['message' => "L'email $request->email' existe déjà"], 422); // 409 Conflict
                } else {
                    return response()->json(['message' => "Le numéro $request->telephone' existe déjà"], 422); // 409 Conflict
                }
            }
            return response()->json([
                'statusText' => $e->validator->errors(),
                "ok" => false,

            ], 422);
        }
    }

    function inscriptionMobile(Request $request)
    {
       
         try {
            $specilaite = Specialite::where('speciality', $request->categorie)->first();
            $grade = Grade::where('titre', $request->specialite)->first();
            $labo = $request->labo != null ? Laboratoire::where('labo', $request->labo)->first() : null;
            $priseEnCharge = $request->labo != null ? "Oui" : "Non";
            $request->validate([
                'email' => 'required|unique:inscriptions,email',
                'telephone' => 'required|unique:inscriptions,telephone'
            ]);
            $inscription = Inscription::create([
                'titre' => $request->civilite,
                'name' => $request->prenom,
                'prenom' => $request->nom,
                'email' => $request->email,
                'pays' => $request->pays,
                'telephone' => $request->telephone,
                'grade' => !empty($grade) ? $grade->id : null,
                'specialite' => !empty($specilaite) ? $specilaite->id : null,
                'labo' => !empty($labo) ? $labo->id : null,
                'charge' => $priseEnCharge,
            ]);
            $nom = $request->civilite . " " . $request->nom;
            $alert = ['id' => $inscription->id, 'email' => $request->email, 'charge' => $priseEnCharge, 'name' => $nom, 'labo' => !empty($labo) ? $labo->id : null, 'specialite' => !empty($specilaite) ? $specilaite->id : null];

            Mail::to($alert['email'])->send(new PreInscription($alert));
            //      $message = (new PreInscription($inscription))
            //     ->onQueue('emails');

            // Mail::to($inscription->email)
            //     ->queue($message);
            return response()->json([
                "statusText" => "$nom votre inscription a été enregistrée avec succès!",
                "ok" => true,
                "status" => 201
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            if (isset($e->validator->errors()->get('email')[0]) || isset($e->validator->errors()->get('telephone')[0])) {
                if (isset($e->validator->errors()->get('email')[0])) {
                    return response()->json(['message' => "L'email $request->email' existe déjà"], 422); // 409 Conflict
                } else {
                    return response()->json(['message' => "Le numéro $request->telephone' existe déjà"], 422); // 409 Conflict
                }
            }
            return response()->json([
                'statusText' => $e->validator->errors(),
                "ok" => false,

            ], 422);
        }
        // try {
        //     $request->validate([
        //         'email' => 'required|unique:inscriptions,email',
        //         'telephone' => 'required|unique:inscriptions,telephone'
        //     ]);
        //     $inscription = Inscription::create([
        //         'titre' => $request->civilite,
        //         'name' => $request->first_name,
        //         'prenom' => $request->last_name,
        //         'email' => $request->email,
        //         'pays' => $request->country,
        //         'telephone' => $request->telephone,
        //         'grade' => $request->grade,
        //         'specialite' => $request->participant_category,
        //         'labo' => $request->laboratoire,
        //         'charge' => $request->laboratoire > 0 ?  "Oui" : "Non",

        //     ]);
        //     return response()->json([
        //         "statusText" => "Votre inscription a été enregistrée avec succès!",
        //         "ok" => true,
        //         "status" => 201
        //     ], 200);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     if (isset($e->validator->errors()->get('email')[0]) || isset($e->validator->errors()->get('telephone')[0])) {
        //         if (isset($e->validator->errors()->get('email')[0])) {
        //             return response()->json(['message' => "L'email $request->email' existe déjà"], 422); // 409 Conflict
        //         } else {
        //             return response()->json(['message' => "Le numéro $request->telephone' existe déjà"], 422); // 409 Conflict
        //         }
        //     }
        //     return response()->json([
        //         'statusText' => $e->validator->errors(),
        //         "ok" => false,

        //     ], 422);
        // }
    }
}
