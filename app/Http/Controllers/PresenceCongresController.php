<?php

namespace App\Http\Controllers;

use App\Exports\ListePresence;
use App\Exports\ParticipantNonInscriBadge;
use App\Exports\PrensenceCongresParjour;
use App\Models\communicationSalle;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PresenceCongresController extends Controller
{
    function index(){
        return view('presence.presence-congres');
    }

    function telechargerListePresenceSession($id){
        $session = communicationSalle::find($id);
        return Excel::download(new PrensenceCongresParjour($session), $session->libelle_session.'.xlsx');
    }
    function listePresence(){
        return Excel::download(new ListePresence, "listepresencecongrescpsaplf.xlsx");
    }

    function participantNonInscritGadget(){
        return Excel::download(new ParticipantNonInscriBadge, "listeParticipantsrecugadgetmaispasinscrit.xlsx");
    }
}
