<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Models\EvalutionSession;
use Illuminate\Support\Facades\Mail;
use App\Models\EvaluationOrganisation;
use App\Mail\SendCertificatParticipation;
use App\Models\EnqueteModel;
use App\Models\ReponseModel;

class QuizController extends Controller
{
    function create($id){

        return view('quiz.quizz', ['idParticipant'=>$id]);
    }

    function store(Request $request){
        //return $request;
        for($i=0; $i<$request->nbre_session; $i++){
            $noteScientique = isset($_REQUEST[$i.'session']) ? $_REQUEST[$i.'session'] : 1;
            $remarqueScientifique = $_REQUEST[$i.'scientifique'];
            $noteTechnique = isset($_REQUEST[$i.'technique']) ? $_REQUEST[$i.'technique'] : 1;
            $remarqueTechnique = $_REQUEST[$i.'remarque_technique'];
            $atelierId = $_REQUEST[$i.'atelier_id'];

            $evalutionSession = EvalutionSession::create([
                'remarque_technique'=>$remarqueTechnique,
                'remarque_scientifique'=>$remarqueScientifique,
                'note_scientifique'=>$noteScientique,
                'note_technique'=>$noteTechnique,
                'session_id'=> $atelierId,
                'id_participant'=>$request->id_participant
            ]);
        }

        $evaluationOrganisation = EvaluationOrganisation::create([
            'note_restauration' => $request->note_restauration > 0 ? $request->note_restauration : 1 ,
            'remarque_gastronomie'=> $request->remarque_gastronomie,
            'note_organisation_generale'=>$request->note_organisation_generale > 0 ? $request->note_organisation_generale : 1,
            'remarques'=>$request->remarques,
            'inscription_id'=>$request->id_participant
        ]);

        $message = (new SendCertificatParticipation($request->id_participant))
            ->onQueue('confirm-emails-abstract');
            $inscription = Inscription::find($request->id_participant);

        Mail::to($inscription->email)
            ->queue($message);
        if (session()->has('inscription')) {
        } else {
            session()->put('inscription'," Vos remarques ont bien été enregistrées.");
            session()->put('color', "225500fa");
        }
        return back();
    }

    function resultatQuiz(){
        $enquete = EnqueteModel::orderBy('id', 'asc')->get();
        $i=0;
        $allReponse = [];
        $allQuestion = [];
        $allCommentaire = [];
        $titre = [];

        foreach($enquete as $v){
            $allReponse[$i]  = EnqueteModel::find($v->id)->reponseModel;
            $allQuestion[$i] = EnqueteModel::find($v->id)->questionModel;
            $allCommentaire[$i] = EnqueteModel::find($v->id)->commentaireLibre;
            $titre[$i] = $v;
            $i++;
        }



        return view('quiz.resultat-quiz', ['allReponse'=>$allReponse, 'allQuestion'=>$allQuestion, 'allCommentaire'=>$allCommentaire, 'titre'=>$titre]);
    }
}
