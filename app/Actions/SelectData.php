<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class SelectData
{
    function selectCompteParNiveau($niveau){
        $compte = DB::table('compte_adherents')
        ->where('grade_id', $niveau)
        ->where('status', 1)
        ->get();
        return $compte;
    }

    function selectCompteAdherent($matriculeAdherent){
        $compte = DB::table('compte_adherents')
        ->where('matricule_adherent', $matriculeAdherent)
        ->where('status', 1)
        ->get();
        return $compte;
    }

    

    function selectSumAchat($matriculeCompte){
        $sumAchat = DB::table('suivi_achat_produits')
                ->where('matricule_compte', $matriculeCompte)
                ->sum('montant');
        return $sumAchat;
    }

    function selectCompteByMatricule($matriculeCompte){
        $compte = DB::table('compte_adherents')
        ->where('matricule_compte', $matriculeCompte)
        //->where('status', 1)
        ->first();
        return $compte;
    }

}