<?php

namespace App\Http\Controllers;

use App\Models\InscriptionAtelierAfaRespir;
use BaconQrCode\Exception\WriterException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BadgeAfaRespirController extends Controller
{
    function badgeAfaParticipant()
    {
        $liste = DB::table('inscription_atelier_afa_respirs')
            ->where('badge', 0)
            //->where('confirm_inscription', 1)
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
            $participant = DB::table('inscription_atelier_afa_respirs')
                ->where('badge', 0)
                //->where('confirm_inscription', 1)
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
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge-afa-respir.badge-participant-afa')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "liste-participant-afa-respir";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function badgeAfaParticulier()
    {
        $inscrit = DB::table('inscription_atelier_afa_respirs')->get();
        return view('badge-afa-respir.badge-particulier-afa', ['inscrit' => $inscrit]);
    }

    function impressionAfaBadge()
    {
        $liste = DB::table('inscription_atelier_afa_respirs')
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
            $participant = DB::table('inscription_atelier_afa_respirs')
                //->where('specialite', $idSpecialite)
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
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge-afa-respir.badge-participant-afa')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "liste-particulier-afa-respir";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function addAfaListeBage(Request $request)
    {
        $verification = InscriptionAtelierAfaRespir::where('id', $request->id)->where('certificat', 1)->first();
        if (!empty($verification)) {
            $update = InscriptionAtelierAfaRespir::where('id', $request->id)
                ->update(['certificat' => 0]);
        } else {
            $update = InscriptionAtelierAfaRespir::where('id', $request->id)
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
