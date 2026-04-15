<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationConference;
use App\Models\BadgeListe;
use App\Models\Inscription;
use BaconQrCode\Exception\WriterException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BadgeController extends Controller
{
    function badgeParticipant()
    {

        $liste = DB::table('inscriptions')
            ->where('confirmation_attestion', 0)
            ->where('confirmation_inscription', 1)
            ->limit(12)
            ->get();


        if (count($liste) == 0) {
            return back();
        }

        $nbreTour = ceil(count($liste) / 2);

        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $participant = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('confirmation_inscription', 1)
                ->limit(2)
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
                    QrCode::size(90)
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
                    return 'Erreur: ' . $name . " erreur " . $e->getMessage();
                }
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge.badge-participant')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "badge-adherent";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function impressionBadge()
    {
        $participant = DB::table('inscriptions')
            ->join('badge_listes', 'inscriptions.id', '=', 'badge_listes.matricule_id_participant')
            ->select('inscriptions.*')
            ->limit(4)
            ->get();



        $html = "";

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
                QrCode::size(90)
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

                $deleteBadgeListe = DB::table('badge_listes')
                    ->where('matricule_id_participant', $v->id)
                    ->delete();
            } catch (WriterException $e) {
                return 'Erreur: ' . $name . " erreur " . $e->getMessage();
            }
        }

        $data = [
            'participants' => $participant
        ];

        $view = view('badge.badge-participant')->with(compact('data'));
        $html .= $view->render();
        // }

        $libelle = "badge-selectionner";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');
    }

    function badgeParticulier()
    {
        return view('badge.badge-particulier');
    }

    function addListeBage(Request $request)
    {
        $participant = Inscription::find($request->id);
        /*   $message = (new ConfirmationConference($participant))
            ->onQueue('confirm-emails-abstract');

       /* Mail::to($participant->email)->queue($message);*/
        $verification = BadgeListe::where('matricule_id_participant', $request->id)
            ->first();
        if (empty($verification)) {
            $badgeListe = BadgeListe::create([
                'matricule_id_participant' => $request->id
            ]);
        }
        return;
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
                ->limit(2)
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

    function badgeParCategorie()
    {
        $inscript = DB::table('inscriptions')->get();
        return view('badge.liste-par-categorie', ['inscription' => $inscript]);
    }

    function badgeParLaboratoire()
    {
        $inscript = DB::table('laboratoires')->where('labo', '>=', 1)->get();
        return view('badge.liste-par-labo', ['inscript' => $inscript]);
    }

    function imprimeParLaboratoire($idLabo)
    {
        $liste = DB::table('inscriptions')
            ->where('confirmation_attestion', 0)
            ->where('labo', $idLabo)
            ->limit(12)
            ->get();
        $labo = DB::table('laboratoires')->where('id', $idLabo)->first();
        $libelleLabo = "badge_laboratoire";
        if (!empty($labo)) {
            $libelleLabo .= " " . $labo->labo;
        }
        if (count($liste) == 0) {
            return back();
        }

        $nbreTour = ceil(count($liste) / 2);

        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $participant = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('labo', $idLabo)
                ->limit(2)
                ->get();
            foreach ($participant as $v) {

                $tabData = explode("'", $v->prenom);
                $prenom = $v->name;
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
                    QrCode::size(90)
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
                    return 'Erreur: ' . $name . " erreur " . $e->getMessage();
                }
            }

            $data = [
                'participants' => $participant
            ];

            $view = view('badge.badge-participant')->with(compact('data'));
            $html .= $view->render();
        }


        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelleLabo . '.pdf');
    }
    function imprimeParCategorie($idCategorie)
    {
        if ($idCategorie == 9 || $idCategorie == 8 || $idCategorie == 5 || $idCategorie== 10) {
            $liste = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('specialite', $idCategorie)
                ->limit(12)
                ->get();
        } else {
            $liste = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('confirmation_inscription', 1)
                ->where('specialite', $idCategorie)
                ->limit(12)
                ->get();
        }

        $specialite = DB::table('specialites')->where('id', $idCategorie)->first();
        $libelleLabo = "badge specialite" . $specialite->speciality;
        if (!empty($labo)) {
            $libelleLabo .= " " . $labo->labo;
        }
        if (count($liste) == 0) {
            return back();
        }

        $nbreTour = ceil(count($liste) / 2);

        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            if ($idCategorie == 9 || $idCategorie == 8 || $idCategorie == 5 || $idCategorie== 10) {
            $participant = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('specialite', $idCategorie)
                ->limit(2)
                ->get();
            }else{
                 $participant = DB::table('inscriptions')
                ->where('confirmation_attestion', 0)
                ->where('confirmation_inscription', 1)
                ->where('specialite', $idCategorie)
                ->limit(2)
                ->get();
            }
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
                    QrCode::size(90)
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
                    return 'Erreur: ' . $name . " erreur " . $e->getMessage();
                }
            }

            $data = [
                'participants' => $participant,

            ];

            $view = view('badge.badge-participant')->with(compact('data'));
            $html .= $view->render();
        }


        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelleLabo . '.pdf');
    }
}
