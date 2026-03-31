<?php


use App\Http\Controllers\AbstractsController;
use App\Http\Controllers\AtelierAfaRespir;
use App\Http\Controllers\BadgeAfaRespirController;
use App\Http\Controllers\BadgeAtelierSaplfScp;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\EnqueteSatisfactionController;
use App\Http\Controllers\HackathonController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PresenceCongresController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SendCertificatCongres;
use App\Http\Controllers\ServiceRenduController;
use App\Http\Controllers\WordController;
use App\Mail\AbstractRejete;
use App\Mail\EnqueteSatisfaction;
use App\Mail\InfoPaiement;
use App\Mail\NoReply;
use App\Models\AtelierSaplfScp;
use App\Models\ComiteOrganisation;
use App\Models\ComOraleValide;
use App\Models\Inscription;
use App\Models\InscriptionAtelierAfaRespir;
use App\Models\PosterValide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Polyfill\Intl\Idn\Info;

Route::get('/mail-excuse', function () {

    $inscription = Inscription::all();
    foreach ($inscription as $v) {

        $message = (new InfoPaiement());
        Mail::to($v->email)->send($message);
    }


    return "OK mail";
});

Route::get('/', function () {
    //return strlen("Tuberculose pharmaco sensible : attitudes chez le personnel de santé en république du");
    if (Auth::guard('web')) {
        return redirect('/dashboard');
    }
    return view('auth.login');
});

Route::get('/personnel-appui', function () {
    return view('comite');
});

Route::post('/personnel-appui', function (Request $res) {
    $res->validate([
        'email' => 'required|unique:comite_organisations',
        'titre' => 'required',
        'service' => 'required'
    ]);



    $comite = ComiteOrganisation::create([
        'titre' => $res->titre,
        'name' => $res->name,
        'prenom' => $res->prenom,
        'email' => $res->email,
        'service' => $res->service

    ]);




    return back()->with('status', $res->titre . " " . $res->name . " vous avez bien été enregistré");
});

Route::get('/rejet-abstract', function () {

    //$valides = ComOraleValide::all();
    $i = 0;
    $valides = DB::table('com_rejetes')->where('confirmation', 0)->get();
    foreach ($valides as $valide) {


        $message = (new AbstractRejete($valide->numero))
            ->onQueue('rejet');

        Mail::to($valide->email)
            ->queue($message);
    }
    return "OK mail";
});

Route::get('/qr-code-transform', function () {

    $path = public_path('atelier-2-drainage-pleural.svg');
    QrCode::size(400)
        ->color(40, 40, 40)
        ->margin(1)
        ->generate(
            "https://dashboard.scpneumologie.com/enquete-satisfaction-congres-saplf-scp/22",
            $path
        );
});

Route::get('/regulariser-atelier', function () {

    //$valides = ComOraleValide::all();
    $i = 0;
    $inscription = Inscription::all();

    foreach ($inscription as $v) {
        if ($v->atelier_pre_1 == "Oui"  or $v->atelier_pre_2 == "Oui") {
            $atelierInscription = AtelierSaplfScp::where('email', $v->email)->first();
            if (empty($atelierInscription)) {
                $inscriptionInst = AtelierSaplfScp::create([
                    'titre' => $v->titre,
                    'name' => $v->name,
                    'prenom' => $v->prenom,
                    'atelier_pre_1' => $v->atelier_pre_1,
                    'prix_atelier_1' => $v->prix_atelier_1,
                    'atelier_pre_2' => $v->atelier_pre_2,
                    'prix_atelier_2' => $v->prix_atelier_2,
                    'grade' => $v->grade,
                    'specialite' => $v->specialite,
                    'email' => $v->email,
                    'telephone' => $v->telephone,
                    'ville' => $v->ville,
                    'pays' => $v->pays,
                ]);
            }
        }
    }
    return "OK mail";
});

// Route::get('/mail-excuse', function () {

//     //$valides = ComOraleValide::all();
//     $i = 0;
//     $valides = PosterValide::get();

//     foreach ($valides as $valide) {
//          $posterExist = DB::table('poster_valides')->where('email', $valide->email)->get();
//        /* $udpateCom = ComOraleValide::where('email', $valide->email)->update([
//             'confirmation' => 1
//         ]);*/
//         if (count($posterExist)>=2) {
//             $poster = PosterValide::where('email', $valide->email)->update([
//                 'confirmation' => 0
//             ]);
//             // $udpateCom = ComOraleValide::where('email', $valide->email)->update([
//             //     'confirmation' => 0
//             // ]);
//             //Mail::to($valide->email)->send(new NoReply($valide));
//         }

//     }
//     return "OK mail";
// });

Route::get('/envoyer-participate/{id}', function ($id) {

    $inscription = Inscription::find($id);
    $message = (new EnqueteSatisfaction($inscription->id))
        ->onQueue('confirm-emails-abstract');

    Mail::to($inscription->email)
        ->queue($message);
    return back();
});

Route::get('/email-enquete-satisfaction', function () {
    $scan = DB::table('scan_presences')
        ->select('invite_id')
        ->distinct()
        ->get();
    foreach ($scan as $v) {
        $inscription = Inscription::find($v->invite_id);
        $message = (new EnqueteSatisfaction($inscription->id))
            ->onQueue('confirm-emails-abstract');

        Mail::to($inscription->email)
            ->queue($message);
    }
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/generating-pdf/{id}', [PDFController::class, 'generatorPDF']);
Route::get('/resultat-pdf/{id}', [PDFController::class, 'resultatPDF']);
Route::get('/lettre-invitation/{id}', [PDFController::class, 'invitationPDF']);
Route::get('/lettre-english/{id}', [PDFController::class, 'invitationEnPDF']);
Route::get('/facture/{id}', [PDFController::class, 'facturePDF']);
Route::get('/facture-laboratoire/{id}', [PDFController::class, 'factureLaboPDF']);
Route::get('/envoyez-lettre-invitation/{id}', [PDFController::class, 'envoyezLettreInvitation']);
Route::controller(CertificationController::class)->group(function () {
    Route::get('/visualiser-certificat-communication/{id}', 'orale')->name('certificat.orale');
    Route::get('/poster-communication-visualisation/{id}', 'poster')->name('certificat.poster');
    Route::get('/oral-envoyer-certificat-communication/{id}', 'orale')->name('orale.certificat');
    Route::get('/conference-envoyer-certificat/{id}', 'reference')->name('reference.certificat');
    Route::get('/certificat-meilleur-presentation/{id}', 'best')->name('best.certificat');
    Route::get('/certificat-participation/{id}', 'participation')->name('participation.certificat');
    Route::get('/certificat-atelier-echographie/{id}', 'participationAtelierEcho')->name('atelier.echographie.certificat');
    Route::get('/certificat-atelier-spirometrie/{id}', 'participationAtelierSpiro')->name('atelier.spirometrie.certificat');
    Route::get('/meilleur-poster-certificat-communication/{id}', 'bestPoster')->name('best.poster');
    Route::get('/first-chercheur/{id}', 'firstChercheur')->name('first.chercheur');
    Route::get('/second-chercheur/{id}', 'secondChercheur')->name('second.chercheur');
    Route::get('/third-chercheur/{id}', 'thirdChercheur')->name('third.chercheur');
    Route::get('/specialiste-first/{id}', 'firstSpecialiste')->name('specialiste.first');
    Route::get('/specialiste-second/{id}', 'secondSpecialiste')->name('specialiste.second');
    Route::get('/moderation-certificat/{id}', 'moderateur')->name('moderation.certificat');
    Route::get('/orateur-certificat/{id}', 'orateur')->name('orateur.certificat');
});
Route::controller(ServiceRenduController::class)->group(function () {

    Route::get('/visualiser-service-rendu/{id}', 'visualisezServiceRendu');
});

Route::controller(AtelierAfaRespir::class)->group(function () {
    Route::get('/afa-respir-certificat-participation/{id}', 'afficherCertificationParticipationAfaRespir')->name('liste.afa.respir.atelier.pre.inscription');
    Route::get('/afa-respir-certificat-communication', 'attestationCommunication');
});


Route::middleware('auth')->group(function () {
    Route::controller(InscriptionController::class)->group(function () {
        Route::get('/liste-pre-inscription', 'index')->name('liste.pre.inscription');
        Route::get('/liste-inscription', 'listeInscription')->name('liste.inscription');
        Route::get('/badge-non-imprime', 'badgeNonImprimer')->name('badge.non.imprime');
        Route::get('/inscription', 'create')->name('inscription');
        Route::post('/inscription', 'save');
        Route::get('/confirmez-inscription/{id}', 'confirmezInscription')->name('confirmez.inscription');
        Route::patch('/confirmez-inscription/{id}', 'saveConfirmezInscription');
        Route::get('/update-inscription/{id}', 'upadeParticipant')->name('update.participant');
        Route::patch('/update-inscription/{id}', 'saveUpadeParticipant');
        Route::get('/excel-liste-inscription', 'listeExcelInscription')->name('excel.liste.inscription');
        Route::get('/liste-presence-excel', 'listePresenceExcel')->name('liste.presence.excel');
        Route::get('/liste-atelier-pre-inscription', 'atelierInscriptionScp')->name('liste.atelier.pre.inscription');
        Route::get('/liste-atelier-inscription', 'listeAtelierInscription')->name('liste.atelier.inscription');
        Route::get('/atelier-badge-non-imprime', 'AtelierNonImprimer')->name('atelier.badge.non.imprime');
        Route::get('/confirm-inscription-atelier/{id}', 'confirmInscriptionAtelier')->name('confirm.inscription.atelier');
    });
    Route::controller(PresenceCongresController::class)->group(function () {
        Route::get('/liste-presence-congres', 'index')->name('liste.presence.congres');
        Route::get('/telecharger-liste-presence/{id}', 'telechargerListePresenceSession');
        Route::get('/participant-presence', 'listePresence');
        Route::get('/participant-non-inscrit-recu-gadget', 'participantNonInscritGadget');
    });
    Route::controller(ServiceRenduController::class)->group(function () {
        Route::get('/ajouter-attestation-service-rendu/{id}', 'ajouterAttestationService')->name('ajouter.attestation.service.rendu');
        Route::post('/ajouter-attestation-service-rendu/{id}', 'addAjouteAttestationService');
        Route::get('/envoi-certificat-service-rendu/{id}', 'envoiCertificatServiceRendu');
    });

    Route::controller(AtelierAfaRespir::class)->group(function () {
        Route::get('/liste-afa-respir-atelier-pre-inscription', 'atelierPreInscriptionAfaRespir')->name('liste.afa.respir.atelier.pre.inscription');
        Route::get('/liste-afa-respir-atelier-inscription', 'listeAtelierInscriptionAfaRespir')->name('liste.afa.respir.atelier.inscription');
        Route::get('/confirm-afa-respir-inscription/{id}', 'confirmationInscriptionAfa')->name('confirm.afa.respir.inscription');
        Route::get('/afa-respir-badge-non-imprime', 'badgeNonImprimer')->name('afa.respir.badge.non.imprime');
        Route::get('atelier-afa-respire-inscription', 'inscriptionAtelierAfa')->name('atelier.afa.respire.inscription');
        Route::post('atelier-afa-respire-inscription', 'saveInscriptionAtelierAfa');
        Route::get('export-liste-presence-afa-respir', 'listePresenceAfa');
        Route::get('envoi-certificat-participation', 'envoiCertificatParticipation');
    });



    Route::controller(AbstractsController::class)->group(function () {
        Route::get('/liste-abstract', 'create')->name('liste.abstracts');
        Route::get('/liste-valide', 'abstractValide')->name('liste.abstracts.valide');
        Route::get('/liste-conference', 'listeConference')->name('liste.conference');
        Route::get('/liste-valide-conference', 'listeValideConference')->name('liste.valide.conference');
        Route::get('/excel-abstract-export', 'exporterAbstractExcel');
        Route::get('/abstract-pdf/{id}', 'abstractPdf')->name('abstract.pdf');
        Route::get('/confirm-abstract/{id}', 'confirmAbstract');
        Route::get('/envoyez-communication-email', 'envoyezCommunicationEmail');
        Route::get('/envoyez-affiche-email', 'envoyezAfficheEmail');
        Route::get('/confirm-poster/{id}', 'confirmPoster');
        Route::get('/confirm-conference/{id}', 'confirmConference');
        Route::get('/correction-oral/{id}', 'correctionOrale');
        Route::get('/correction-poster/{id}', 'correctionPoster');
        Route::get('/abstract-rejete/{id}', 'rejeterAbstract');
        Route::get('/update-abstract/{id}', 'upadeParticipant')->name('update.abstract;');
        Route::patch('/update-abstract/{id}', 'saveUpadeParticipant');
        Route::get('/update-abstract/{id}', 'upadeAbstract')->name('update.abstract');
        Route::patch('/update-abstract/{id}', 'saveUpadeAbstract');
        Route::get('/ajouter-session', 'ajouterSession')->name('ajouter.session');
        Route::post('/ajouter-session', 'saveSession');
        Route::get('/update-session/{id}', 'updateSession')->name('update.session');
        Route::post('/update-session/{id}', 'saveUpdateSession');
        Route::get('/send-conference-certificat/{id}', 'sendConferenceCertificat')->name('send.conference.certificat');
        Route::get('/send-certificat-communication/{id}', 'sendCertificatCommunication')->name('send.certificat.communication');
        Route::get('/send-certificat-poster/{id}', 'sendCertificatPoster')->name('send.certificat.poster');
    });

    Route::controller(SendCertificatCongres::class)->group(function () {
        Route::get('/send-congres-participation/{id}', 'sendCongresParticipate');
        Route::get('/send-atelier-congres-participation/{id}', 'sendAtelierParticipate');
        Route::get('/send-moderation-certificate/{id}', 'sendModeration');
        Route::get('/send-certificat-all-participation', 'sendCertificatAllParticipation');
        Route::get('/send-all-atelier-certificate', 'sendAtelierAllParticipate');
        Route::get('/send-orale-all-certificate', 'sendOraleCertificate');
        Route::get('/send-affiche-all-certificate', 'sendAfficheCertificate');
        Route::get('/send-conference-all-certificate', 'sendConferenceCertificate');
    });
    Route::controller(WordController::class)->group(function () {
        Route::get('/word-abstract/{id}', 'createWord')->name('word.abstracts');
    });


    Route::controller(BadgeController::class)->group(function () {
        Route::get('/badge-participant', 'badgeParticipant');
        Route::get('/badge-particulier', 'badgeParticulier');
        Route::get('/imprimer-badge', 'impressionBadge');
        Route::post('/badge-liste', 'addListeBage');
        Route::get('/badge-personnel-appui', 'badgePersonnelAppui');
    });




    Route::controller(EnqueteSatisfactionController::class)->group(function () {
        Route::get('/creer-titre', 'createTitle')->name('ajouter.titre');
        Route::post('/creer-titre', 'saveTitle');
        Route::get('/creer-question/{idTitre}', 'createQuestion')->name('ajouter.question');
        Route::post('/creer-question/{idTitre}', 'saveQuestion');
    });

    Route::controller(HackathonController::class)->group(function () {
        Route::get('/badge-hackathon', 'badgeHackathon');
        Route::get('/certificat-hackathon', 'AttestationParticipation');
    });
});



Route::controller(BadgeController::class)->group(function () {
    Route::get('/badge-participant', 'badgeParticipant');
    Route::get('/badge-particulier', 'badgeParticulier');
    Route::get('/imprimer-badge', 'impressionBadge');
    Route::post('/badge-liste', 'addListeBage');
});
Route::controller(ScanController::class)->group(function () {
    Route::get('/listes-sessions', 'listeSession')->name('liste.session');
    Route::get('/stats-sessions', 'statSession')->name('stats.session');
    Route::get('/scan-participant/{id}', 'scanSession')->name('liste.session');
    Route::post('/save-scan', 'saveScan');
    Route::get('/scan-atelier-afa-respir', 'scanAfaRespir');
    Route::post('/save-participant-afa', 'saveParticipantAfa');
});

Route::controller(QuizController::class)->group(function () {
    Route::get('/quiz-participant/{id}', 'create')->name('quiz.participant');
    Route::post('/quiz-participant', 'store');
    Route::get('/resultat-quiz', 'resultatQuiz')->name('resultat.quiz');
});
Route::controller(EnqueteSatisfactionController::class)->group(function () {
    Route::get('/enquete-satisfaction-congres-saplf-scp/{id}', 'showEnquete')->name('enquete.satisfaction');
    Route::post('/enquete-satisfaction-confres-saplf-scp/{id}', 'saveEnquete');
    // Route::get('/creer-question/{idTitre}', 'createQuestion')->name('ajouter.question');
    // Route::post('/creer-question/{idTitre}', 'saveQuestion');
});




Route::fallback(function () {
    // ...
    return view('error.error-404');
});

// Route::fallback(function () {
//     // ...
//     return view('error.error-default');
// });

require __DIR__ . '/auth.php';
