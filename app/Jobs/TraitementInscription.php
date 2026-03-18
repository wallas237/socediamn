<?php

namespace App\Jobs;

use App\Actions\SelectData;
use App\Models\CompteAdherent;
use App\Models\TraitementInscription as ModelsTraitementInscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class TraitementInscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public CompteAdherent $data;
    public function __construct(CompteAdherent $data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(SelectData $selectData): void
    {
        //paiement des primes d'inscription
        //premier géneration 
        $inscription = DB::table('suivi_compte_inscriptions')
            ->where('matricule_compte', $this->data->matricule_compte)
            ->first();
        $generation1 = $selectData->selectCompteByMatricule($this->data->matricule_parrain);
        /* DB::table('compte_adherents')
            ->where('matricule_compte', $this->data->matricule_parrain)
            ->first();*/
        if (!empty($generation1)) {
            if ($generation1->status == 1) {
                $gainPremiereGeneration1 = $inscription->montant * 0.25;
                $traitementInscription = ModelsTraitementInscription::create([
                    'matricule_compte' => $this->data->matricule_compte,
                    'matricule_compte_parrain' => $this->data->matricule_parrain,
                    'produit_id' => $this->data->produit_id,
                    'montant' => $gainPremiereGeneration1,
                    'pourcentage' => "0.25",
                ]);

                $solde = DB::table('adherent_wallets')
                    ->where('matricule_adherent', $generation1->matricule_adherent)
                    ->increment('solde', $gainPremiereGeneration1);
            }

            /********************** */
            $generation2 = $selectData->selectCompteByMatricule($generation1->matricule_parrain);
            /*DB::table('compte_adherents')
                ->where('matricule_compte', $generation1->matricule_parrain)
                ->first();*/

            if (!empty($generation2)) {
                if ($generation2->status == 1) {
                    $gainPremiereGeneration2 = $inscription->montant * 0.125;
                    $traitementInscription = ModelsTraitementInscription::create([
                        'matricule_compte' => $this->data->matricule_compte,
                        'matricule_compte_parrain' => $generation2->matricule_compte,
                        'produit_id' => $this->data->produit_id,
                        'montant' => $gainPremiereGeneration2,
                        'pourcentage' => "0.125",
                    ]);

                    $solde = DB::table('adherent_wallets')
                        ->where('matricule_adherent', $generation2->matricule_adherent)
                        ->increment('solde', $gainPremiereGeneration2);
                }


                /* ****************************** */
                $generation3 = $selectData->selectCompteByMatricule($generation2->matricule_parrain);
                /*DB::table('compte_adherents')
                    ->where('matricule_compte', $generation2->matricule_parrain)
                    ->first();*/
                if (!empty($generation3)) {
                    if ($generation3->status == 1) {
                        $gainPremiereGeneration3 = $inscription->montant * 0.0625;
                        $traitementInscription = ModelsTraitementInscription::create([
                            'matricule_compte' => $this->data->matricule_compte,
                            'matricule_compte_parrain' => $generation3->matricule_compte,
                            'produit_id' => $this->data->produit_id,
                            'montant' => $gainPremiereGeneration3,
                            'pourcentage' => "0.0625",
                        ]);

                        $solde = DB::table('adherent_wallets')

                            ->where('matricule_adherent', $generation3->matricule_adherent)
                            ->increment('solde', $gainPremiereGeneration3);
                    }
                    /* ****************************** */
                    $generation4 = $selectData->selectCompteByMatricule($generation3->matricule_parrain);
                    /*DB::table('compte_adherents')
                        ->where('matricule_compte', $generation3->matricule_parrain)
                        ->first();*/
                    if (!empty($generation4)) {
                        if ($generation4->status == 1) {
                            $gainPremiereGeneration4 = $inscription->montant * 0.03125;
                            $traitementInscription = ModelsTraitementInscription::create([
                                'matricule_compte' => $this->data->matricule_compte,
                                'matricule_compte_parrain' => $generation4->matricule_compte,
                                'produit_id' => $this->data->produit_id,
                                'montant' => $gainPremiereGeneration4,
                                'pourcentage' => "0.03125",
                            ]);

                            $solde = DB::table('adherent_wallets')
                                ->where('matricule_adherent', $generation4->matricule_adherent)
                                ->increment('solde', $gainPremiereGeneration4);
                        }


                        /* ****************************** */
                        $generation5 = $selectData->selectCompteByMatricule($generation4->matricule_parrain);
                        /*DB::table('compte_adherents')
                            ->where('matricule_compte', $generation4->matricule_parrain)
                            ->first();*/
                        if (!empty($generation5)) {
                            if($generation5->status == 1){
                                $gainPremiereGeneration5 = $inscription->montant * 0.03125;
                                $traitementInscription = ModelsTraitementInscription::create([
                                    'matricule_compte' => $this->data->matricule_compte,
                                    'matricule_compte_parrain' => $generation5->matricule_compte,
                                    'produit_id' => $this->data->produit_id,
                                    'montant' => $gainPremiereGeneration5,
                                    'pourcentage' => "0.03125",
                                ]);
    
                                $solde = DB::table('adherent_wallets')
                                    ->where('matricule_adherent', $generation5->matricule_adherent)
                                    ->increment('solde', $gainPremiereGeneration5);
                            }
                           
                        }
                    }
                }
            }
        }





        $suiviInscription = DB::table('suivi_compte_inscriptions')
            ->where('matricule_compte', $this->data->matricule_compte)
            ->update([
                'status' => 1
            ]);
    }
}
