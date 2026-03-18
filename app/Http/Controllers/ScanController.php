<?php

namespace App\Http\Controllers;

use App\Models\ScanAfaRespire;
use App\Models\ScanPresence;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    function listeSession()
    {
        return view('scan.liste-session');
    }

    function scanSession($id)
    {
        return view('scan.scan-qrcode', compact('id'));
    }

    function scanAfaRespir()
    {
        return view('atelier-afa.scan-afa-respir');
    }

    function saveParticipantAfa(Request $request)
    {
        $infos = "";
        $invit_id = "";
        $tabPart = explode('_', $request->info_participant);
        $id = $tabPart[0];

        if (count($tabPart) > 1) {
            $existe = ScanAfaRespire::where('id_participant', $id)
                ->first();
            if (empty($existe)) {
                $scan = ScanAfaRespire::create([
                    'id_participant' => $id,
                ]);
            } else {
                // $count = ScanAfaRespire::where('id_participant', $id)
                // ->get();
                // if(count($count)<=2){
                //     $scan = ScanAfaRespire::create([
                //     'id_participant' => $id,
                // ]);
                // }
            }
        }



        return back();
    }

    function saveScan(Request $request)
    {
        $infos = "";
        $invit_id = "";
        $tabPart = explode('_', $request->info_participant);
        $id = $tabPart[0];
        /*if (count($tabPart) >= 2) {
            $invit_id = "participant";
            $infos = $tabPart[0];
            $id = $tabPart[1];
        }

        $tabDelegue = explode('_del', $request->info_participant);
        if (count($tabDelegue) >= 2) {
            $invit_id = "delegue";
            $infos = $tabDelegue[0];
            $id = $tabDelegue[1];
        }

        $tabComme = explode('_com', $request->info_participant);
        if (count($tabComme) >= 2) {
            $invit_id = "appuis";
            $infos = $tabComme[0];
            $id = $tabComme[1];
        }*/
        if (count($tabPart) > 1) {
            if ($tabPart[1] == 'ins') {
                $existe = ScanPresence::where('session_id', $request->session_id)
                    ->where('invite_id', $id)
                    ->where("type", 'ins')
                    ->first();
                if (empty($existe)) {
                    $scan = ScanPresence::create([
                        'info_participant' => $infos,
                        'session_id' => $request->session_id,
                        'invite_id' => $id,
                        'type_invite' => "ins",
                    ]);
                }
            } else {
                $existe = ScanPresence::where('session_id', $request->session_id)
                    ->where('invite_id', $id)
                    ->first();
                if (empty($existe)) {
                    $scan = ScanPresence::create([
                        'info_participant' => $infos,
                        'session_id' => $request->session_id,
                        'invite_id' => $id,
                        'type_invite' => "",
                    ]);
                }
            }
        }



        return back();
    }

    function statSession()
    {
        return view('scan.stats-session');
    }
}
