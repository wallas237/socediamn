<?php

namespace App\Http\Controllers\api;

use App\Events\SendEmailInscription;
use App\Http\Controllers\Controller;
use App\Mail\PreInscription;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $alert = ['id'=>$inscription->id,'email'=>$request->email, 'charge'=>$inscription->charge, 'name'=>$nom, 'labo'=>$request->laboratoire, 'specialite'=>$request->participant_category];

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
}
