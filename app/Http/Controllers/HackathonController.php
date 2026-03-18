<?php

namespace App\Http\Controllers;

use BaconQrCode\Exception\WriterException;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HackathonController extends Controller
{
    function badgeHackathon()
    {
        $liste = DB::table('participants')
            ->where('badge', 0)
            // ->where('confirmation_inscription', 1)
            ->limit(12)
            ->get();


        if (count($liste) == 0) {
            return back();
        }

        $nbreTour = ceil(count($liste) / 4);

        $html = "";
        for ($i = 1; $i <= $nbreTour; $i++) {
            $participant = DB::table('participants')
                ->where('badge', 0)
                //->where('confirmation_inscription', 1)
                ->limit(4)
                ->get();


            $data = [
                'participants' => $participant
            ];

            $view = view('hackathon.badge-hackathon')->with(compact('data'));
            $html .= $view->render();
        }

        $libelle = "badge-hackathon";
        $pdf = PDF::loadHTML($html);
        $sheet = $pdf->setPaper('a4', 'portrait');

        //  return $pdf->stream();
        return $sheet->download($libelle . '.pdf');

        //return view('hackathon.badge-hackathon');
    }

    function attestationParticipation()
    {
        // $options = new Options();
        // $options->set('isRemoteEnabled', true);
        // $options->set('chroot', public_path()); // ou le chemin où se trouve votre police
        // $options->set('defaultFont', 'Apple Chancery');
        // $dompdf = new Dompdf($options);

        // // Charger la police
        // $dompdf->getFontMetrics()->registerFont(
        //     ['family' => 'Apple Chancery', 'style' => 'normal', 'weight' => 'normal'],
        //     public_path('assets/fonts/Apple Chancery.ttf') // Chemin vers votre fichier de police
        // );

        // $html = view('hackathon.hackathon-certificat')->render();
        // $dompdf->loadHtml($html);
        // $dompdf->render();
        // return $dompdf->stream();
        // return $dompdf->stream('document.pdf');
        // Chemin vers la police
        $fontPath = public_path('assets/fonts/AppleChancery.ttf');

        // Assurez-vous que la police est accessible
        if (!file_exists($fontPath)) {
            return "non disponible";
        }
        $pdf = PDF::loadView('hackathon.hackathon-certificat')
            ->setOption(
                [
                    'fontDir' => public_path('assets/fonts'),
                    'fontCache' => public_path('assets/fonts'),
                    'defaultFont' => "Apple Chancery",
                    'isRemoteEnabled' => true, // Important si votre view contient des assets externes
                    'isHtml5ParserEnabled' => true,
                ]
            )

            ->setPaper('a4', 'landscape');
        return $pdf->download('document.pdf');
        return $pdf->stream();
        //return view('hackathon.hackathon-certificat');

    }
}
