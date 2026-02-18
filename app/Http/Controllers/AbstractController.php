<?php

namespace App\Http\Controllers;

use App\Mail\AbstractEnvoye;
use App\Models\Abstracts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AbstractController extends Controller
{

    function abstractSave(Request $request){
       // return $request;
        $absatract = Abstracts::create([
            'civilite' => $request->civilite,
            'name' => $request->name,
            'email' => $request->email_correspondant,
            'titre' => $request->titre_abstract,
            'correspondant' => $request->correspondant,
            'affiliation' => $request->affiliation_auteur,
            'auteurs' => $request->auteurs,
            'introduction' => $request->introduction,
            'methode' => $request->methode,
            'resultat' => $request->resultat,
            'conclusion' => $request->conclusion,
            'email_correspondant' => $request->email_correspondant
        ]);
        
        Mail::to($request->email_correspondant)->send(new AbstractEnvoye($absatract));
        return response()->json([
            'message' => 'Abstract enregistré avec succès',
            'data' => $absatract
        ]);

    }
}
