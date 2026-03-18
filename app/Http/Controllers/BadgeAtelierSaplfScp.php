<?php

namespace App\Http\Controllers;

use App\Models\AtelierSaplfScp;
use App\Models\Inscription;
use BaconQrCode\Exception\WriterException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BadgeAtelierSaplfScp extends Controller
{
    function badgeAtelierScpSaplf()
    {

        // $labo = DB::table('specialites')
        //     ->where('id', $idSpecialite)
        //     ->first();
        $nbreTour = 3;
        //return $nbreTour;
        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $participant = DB::table('atelier_saplf_scps')

                ->where('badge', 0)

                ->limit(4)
                ->get();
            $checkSiAtelier = 0;

            if (count($participant) == 0) {
                return back();
            }
            foreach ($participant as $v) {

                $tabData = explode("'", $v->name);
                $prenom = $v->prenom;
                if (count($tabData) >= 2) {
                    if ($checkSiAtelier == 0) {
                        $name = $v->id . "_" . $v->titre . " " . $tabData[0] . "" . $tabData[1] . " " . $prenom;
                    } else {
                        $name = $v->id . "_ins_" . $v->titre . " " . $tabData[0] . "" . $tabData[1] . " " . $prenom;
                    }
                } else {
                    if ($checkSiAtelier == 0) {
                        $name = $v->id . "_" . $v->titre . " " . $v->name . " " . $prenom;
                    } else {
                        $name = $v->id . "_ins_" . $v->titre . " " . $v->name . " " . $prenom;
                    }
                }
                $name .= "_pa" . $v->id;

                $path = public_path('qrcode/' . $v->id . "_pa" . '.svg');
                try {
                    $content = $name; // Remplacez par votre contenu
                    $name = mb_convert_encoding($content, 'UTF-8', 'ISO-8859-1');
                    QrCode::size(80)
                        // ->merge('/public/img/scc-bg.svg')
                        //->style('dot')
                        ->color(40, 40, 40)
                        //->eye('circle')
                        //->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                        ->margin(1)
                        ->generate(
                            "$name",
                            $path
                        );
                } catch (WriterException $e) {
                    return 'Erreur: ' . $e->getMessage();
                }
                if ($checkSiAtelier == 0) {
                    $update = DB::table('atelier_saplf_scps')
                        ->where('id', $v->id)
                        ->update([
                            'badge' => 1,
                        ]);
                } else {
                    $update = DB::table('atelier_payant_verifications')
                        ->where('email', $v->email)
                        ->update([
                            'badge' => 1,
                        ]);
                }
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge-atelier.badge-participant-atelier')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "participant-atelier-payant";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function badgeAtelierParticulier()
    {
        $inscrit = DB::table('atelier_saplf_scps')->get();
        return view('badge-atelier.badge-particulier-atelier', ['inscrit' => $inscrit]);
    }

    function impressionAtelierBadge()
    {


        $liste = DB::table('atelier_saplf_scps')
            ->where('certificat', 1)
            ->limit(12)
            ->get();

        //return $liste;
        if (count($liste) == 0) {
            return back();
        }
        // $labo = DB::table('specialites')
        //     ->where('id', $idSpecialite)
        //     ->first();
        $nbreTour = ceil(count($liste) / 4);
        //return $nbreTour;
        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $participant = DB::table('atelier_saplf_scps')
                ->where('certificat', 1)
                ->limit(4)
                ->get();

            foreach ($participant as $v) {

                $tabData = explode("'", $v->name);
                $prenom = $v->prenom;
                if (count($tabData) >= 2) {
                    $name = $v->id . "_" . $v->titre . " " . $tabData[0] . "" . $tabData[1] . " " . $prenom;
                } else {
                    $name = $v->id . "_" . $v->titre . " " . $v->name . " " . $prenom;
                }
                $name .= "_pa" . $v->id;

                $path = public_path('qrcode/' . $v->id . "_pa" . '.svg');
                try {
                    $content = $name; // Remplacez par votre contenu
                    $name = mb_convert_encoding($content, 'UTF-8', 'ISO-8859-1');
                    QrCode::size(80)
                        // ->merge('/public/img/scc-bg.svg')
                        //->style('dot')
                        ->color(40, 40, 40)
                        //->eye('circle')
                        //->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                        ->margin(1)
                        ->generate(
                            "$name",
                            $path
                        );
                } catch (WriterException $e) {
                    return 'Erreur: ' . $e->getMessage();
                }


                $update = DB::table('atelier_saplf_scps')
                    ->where('id', $v->id)
                    ->update([
                        'certificat' => 0,
                    ]);
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge-atelier.badge-participant-atelier')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "liste-atelier-payant";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function addAtelierListeBage(Request $request)
    {
        $verification = AtelierSaplfScp::where('id', $request->id)->where('certificat', 1)->first();
        if (!empty($verification)) {
            $update = AtelierSaplfScp::where('id', $request->id)
                ->update(['certificat' => 0]);
        } else {
            $update = AtelierSaplfScp::where('id', $request->id)
                ->update(['certificat' => 1]);
        }


        return;
    }

    function impressionBadge()
    {
        $inscription = DB::table('inscriptions')
            ->join('badge_listes', 'badge_listes.matricule_id_participant', '=', 'inscriptions.id')
            ->select('titre', 'email', 'name', 'prenom', 'specialite', 'inscriptions.id', 'inscriptions.grade', 'ville', 'pays')
            ->limit(4)
            ->get();

        $arrayQrcode = [];
        $compte = 0;
        foreach ($inscription as $v) {
            $tabData = explode("'", $v->name);
            $prenom = $v->prenom;
            if (count($tabData) >= 2) {
                $name = $v->id . "_" . $v->titre . " " . $tabData[0] . "" . $tabData[1] . " " . $prenom;
            } else {
                $name = $v->id . "_" . $v->titre . " " . $v->name . " " . $prenom;
            }
            $path = public_path('qrcode/' . $v->id . "_pa" . '.svg');
            $arrayQrcode[$v->id] =  QrCode::size(100)
                // ->merge('/public/img/scc-bg.svg')
                //->style('dot')
                ->color(40, 40, 40)
                ->eye('circle')
                //->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
                ->margin(1)
                ->generate(
                    "$name",
                    $path
                );
            $deleteBadgeListe = DB::table('badge_listes')
                ->where('matricule_id_participant', $v->id)
                ->delete();
        }

        $pdf = PDF::loadView('badge-afa-respir.badge-afa', ['participants' => $inscription])
            ->setPaper('a4', 'portrait');
        return $pdf->stream();
        // return view('badge.badge',  ['inscription'=>$inscription, 'arrayQrcode'=>$arrayQrcode]);
    }

    function printBadgeCheck() {}

    function badgePersonnelAppui()
    {
        $liste = DB::table('comite_organisations')
            ->where('badge', 0)
            ->limit(12)
            ->get();


        if (count($liste) == 0) {
            return back();
        }

        $nbreTour = ceil(count($liste) / 4);
        //return $nbreTour;
        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $badges = DB::table('comite_organisations')
                ->where('badge', 0)
                ->limit(4)
                ->get();


            $data = [
                'badges' => $badges
            ];

            $view = view('badge.badge-personnel-appui')->with(compact('data'));
            $html .= $view->render();
        }


        $libelle = "badge-personnel-appui";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        return $sheet->download($libelle . '.pdf');
    }
}
