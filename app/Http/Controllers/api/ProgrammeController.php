<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RessourceAjouterDetailSessions;
use App\Http\Resources\RessourceCommunicationSalle;
use App\Models\AjouterDetailSessions;
use App\Models\CommunicationSalle;
class ProgrammeController extends Controller
{
    function getAllsession(){
        return RessourceCommunicationSalle::collection(CommunicationSalle::all());
        
    }

    function getDetailProgramme($communicationSalleId){
        $data = AjouterDetailSessions::where('communication_salle_id', $communicationSalleId)->get();
        if($data->isEmpty()){
            return response()->json(['message' => 'Aucun détail de session trouvé pour cette salle de communication.'], 404);
        }   
        return RessourceAjouterDetailSessions::collection($data);
    }

    function allIntevenants(){

        $all = AjouterDetailSessions::select('orateur')->distinct()->get();
        return json_encode($all);
    }
}
