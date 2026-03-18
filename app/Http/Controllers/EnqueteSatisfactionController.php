<?php

namespace App\Http\Controllers;

use App\Models\EnqueteModel;
use App\Models\QuestionModel;
use App\Models\ReponseCommentaire;
use App\Models\ReponseModel;
use Illuminate\Http\Request;

class EnqueteSatisfactionController extends Controller
{
    function createTitle()
    {
        return view('quiz.titre-enquete');
    }


    function saveTitle(Request $request)
    {
        $request->validate([
            "titre_enquete" => "required|unique:enquete_models"
        ]);
        $enquete = EnqueteModel::create([
            'titre_enquete' => $request->titre_enquete
        ]);
        return back()->with('status', 'les informations ont bien été enregistrées');
    }

    function createQuestion($idSession)
    {
        $session = EnqueteModel::find($idSession);
        return view('quiz.question-quiz', ['sessions' => $session]);
    }

    function saveQuestion(Request $request, $idSession)
    {
        $request->validate([
            "libelle_question" => "required"
        ]);
        $question = QuestionModel::create([
            "enquete_model_id" => $idSession,
            "libelle_question" => $request->libelle_question
        ]);
        return back()->with('status', 'La question a bien été enregistrée');
    }

    function showEnquete($idEnquete){
        $questions = QuestionModel::enqueteQuestion($idEnquete)->get();
        $titre = EnqueteModel::titre($idEnquete)->first();

        return view('quiz.quizz-enquete', ['questions'=>$questions, 'titre'=>$titre]);
    }

    function saveEnquete(Request $request, $idEnquete){
        $enquete = EnqueteModel::find($idEnquete);
        $selectQuest = $enquete->questionModel;
        // $nbre = count($selectQuest);
        // return $selectQuest;
       // return $request;
       date_default_timezone_set('Africa/Douala');

        // Afficher la date et l'heure actuelles

       $numeroReponse = date('Y-m-d H:i:s');
        foreach($selectQuest as $v){
            $reponse = ReponseModel::create([
                'numero_reponse'=>$numeroReponse,
                'enquete_model_id'=>$request->enquete_model_id,
                'question_model_id'=>$_POST['question_model_id'.$v->id],
                'note'=>$_POST['note'.$v->id]
            ]);
        }
        //if($request->commentaire_libre != null){
            $commentaire = ReponseCommentaire::create([
                'numero_reponse'=>$numeroReponse,
                'enquete_model_id'=>$request->enquete_model_id,
                'reponse_commentaire_libre'=>$request->commentaire_libre,
            ]);
        //}
        return back()->with('status', 'Votre avis a bien été enregistré');
    }
}
