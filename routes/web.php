<?php

use App\Events\EmailConfirmationInscription;

//use PDF;
//use App\Models\Delegue;
use App\Events\SendEmailAbstract;
use App\Events\SendEmailInscription;
use App\Http\Controllers\PDFController;
use App\Mail\AlertAbstract;
use App\Mail\CertificateHta;
use App\Mail\ConfirmAbstract;
use App\Mail\Noreply;
use App\Models\Abstracts;

use App\Models\ComiteOrganisation;
use App\Models\Grade;

use App\Models\Inscription;

use App\Models\InscriptionDelegue;

use App\Models\Laboratoire;
use App\Models\ScanPresence;
use App\Models\Specialite;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//ln -s ../storage/app/public storage.
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/generating-pdf/{id}', [PDFController::class, 'generatorPDF']);
Route::get('/resultat-pdf/{id}', [PDFController::class, 'resultatPDF']);
Route::get('/lettre-invitation/{id}', [PDFController::class, 'invitationPDF']);
Route::get('/lettre-english/{id}', [PDFController::class, 'invitationEnPDF']);
Route::get('/facture/{id}', [PDFController::class, 'facturePDF']);
Route::get('/facture-laboratoire/{id}', [PDFController::class, 'factureLaboPDF']);
Route::get('/', function () {
    $get = DB::table('grades')->orderBy('titre', 'asc')->get();
    $labos = DB::table('laboratoires')->orderBy('labo', 'asc')->get();
    $specia = DB::table('specialites')->orderBy('speciality', 'asc')->get();
    $delegue = DB::table('delegues')->orderBy('nom', 'asc')->get();
    Mail::to('clubdiabetegyneco@gmail.com')->send(new Noreply());

    return view('mail.noreply', ['grades' => $get, 'specia' => $specia, 'labos' => $labos, 'delegue' => $delegue]);
});

Route::get('/confirmation-etudiant/{id}', function ($id) {


    return view('confirmation-etudiant', ['id' => $id]);
});

Route::post('/etudiant-confirmation-save', function (Request $request) {





    $chemin = $request->file('fichier')->store('resume');
    $confirmation = DB::table('inscriptions')
        ->where('id', $request->id)
        ->update(['fichier' => $chemin]);
    if (session()->has('abstract')) {
    } else {
        session()->put('abstract', "L'opération a bien été enregistrée");
        session()->put('color', "225500fa");
    }

    return back();
});

Route::get('/liste-etudiant', function () {
    $get = DB::table('inscriptions')->where('specialite', 5)->paginate(40);

    return view('admin.list-etudiant', ['inscript' => $get]);
});

Route::post('/voir-recu', function (Request $request) {
    $get = DB::table('inscriptions')->where('id', $request->id)->first();

    return $get->fichier;
});


Route::post('/send-certificate-save', function (Request $request) {





    $chemin = $request->file('fichier')->store('resume');


    $cert = DB::table('inscriptions')->where('email', $request->email)->first();
    $alert = ['email' => $request->email, 'fichier' => '/' . $chemin, 'titre' => $cert->titre, 'name' => $cert->name];

    Mail::to($alert['email'])->send(new CertificateHta($alert));
    $confirmation = DB::table('inscriptions')
        ->where('id', $cert->id)
        ->update(['confirmation_inscription' => 1, 'ordonnateur' => Auth::user()->name]);
    if (session()->has('abstract')) {
    } else {
        session()->put('abstract', "La certification a été enregistrée");
        session()->put('color', "225500fa");
    }

    return back();
});
Route::get('/send-certificate/{id}', function ($id) {
    $get = DB::table('inscriptions')->where('id', $id)->first();

    return view('admin/certificate', ['email' => $get->email]);
})->middleware(['auth']);
Route::post('/send-certificate-save', function (Request $request) {





    $chemin = $request->file('fichier')->store('resume');


    $cert = DB::table('inscriptions')->where('email', $request->email)->first();
    $alert = ['email' => $request->email, 'fichier' => '/' . $chemin, 'titre' => $cert->titre, 'name' => $cert->name];

    Mail::to($alert['email'])->send(new CertificateHta($alert));
    $confirmation = DB::table('inscriptions')
        ->where('id', $cert->id)
        ->update(['confirmation_inscription' => 1, 'ordonnateur' => Auth::user()->name]);
    if (session()->has('abstract')) {
    } else {
        session()->put('abstract', "La certification a été enregistrée");
        session()->put('color', "225500fa");
    }

    return back();
});
Route::get('/inscription-socediamn', function () {
    $get = DB::table('grades')->orderBy('titre', 'asc')->get();
    $labos = DB::table('laboratoires')->orderBy('labo', 'asc')->get();
    $specia = DB::table('specialites')->orderBy('speciality', 'asc')->get();
    $delegue = DB::table('delegues')->orderBy('nom', 'asc')->get();

    return view('inscription', ['grades' => $get, 'specia' => $specia, 'labos' => $labos, 'delegue' => $delegue]);
});




Route::get('/soumettre-un-resume', function () {
    return view('resume');
});

Route::post('/resume-save', function (Request $request) {
    $verifie = DB::table('abstracts')
        ->where('name', $request->name)
        ->where('email', $request->email)
        ->where('titre', $request->titre)->first();
    /*  ->where('resume', $request->resume)
                      ->where('auteurs', $request->auteurs)->first();*/

    if (!empty($verifie)) {
        if (session()->has('abstract')) {
        } else {
            session()->put('abstract', "Vous avez déjà été enregistré");
            session()->put('color', "ff6600fa");
        }
    } else {
        $abstract = Abstracts::create([
            'civilite' => $request->civilite,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'titre' => $request->titre,
            'fichier' => $request->file('fichier')->store('resume'),


        ]);
        //dd($abstract);
        $data = ['email' => $abstract->email, 'fichier' => $abstract->fichier, 'titre' => $abstract->titre, 'phone' => $abstract->telephone, 'civilite' => $abstract->civilite, 'name' => $abstract->name];
        //SendEmailAbstract::dispatch($data);
        event(new SendEmailAbstract($data));

        if (session()->has('abstract')) {
        } else {
            session()->put('abstract', "Votre résumé a été enregistré");
            session()->put('color', "225500fa");
        }
    }
    return back();
});
Route::post('/inscription-save', function (Request $resq) {
    $verifie = DB::table('inscriptions')
        ->where('name', $_POST['name'])
        ->where('prenom', $_POST['prenom'])
        ->orwhere('email', $_POST['email'])
        ->orwhere('telephone', trim($_POST['telephone']))->first();
    $nom = $_POST['titre'];
    if (!empty($verifie)) {
        if (session()->has('inscription')) {
        } else {
            session()->put('inscription', $nom . " " . $_POST['name'] . " vous avez déjà été enrgistré");
            session()->put('color', "ff6600fa");
        }
    } else {

        $inscription = Inscription::create([
            'titre' => $nom,
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'prenom' => $_POST['prenom'],
            /*'ville'=>$_POST['ville'],*/
            'pays' => $_POST['pays'],
            /*'gender'=>$_POST['gender'],*/
            'telephone' => $_POST['telephone'],
            'grade' => $_POST['grade'],
            'specialite' => $_POST['specialite'],
            'labo' => $_POST['labo'],
            'charge' => $_POST['charge'],
            'delegue' => $_POST['delegue'],

        ]);
        SendEmailInscription::dispatch($inscription);

        // event(new SendEmailInscription($inscription));
        //print_r($_POST);
        // die();
        /* $detail = ['email'=>$_POST['email'], 'charge'=>$_POST['charge'], 'name'=>$_POST['name'].' '.$_POST['prenom'], 'titre'=>$nom];
    //$alert = ['email'=>'sccardiologie237@yahoo.fr', 'mail'=>$_POST['email'], 'name'=>$nom.' '.$_POST['prenom'], 'phone'=>$_POST['telephone']];
    $alert = ['email'=>'wlunderwear237@gmail.com', 'mail'=>$_POST['email'], 'charge'=>$_POST['charge'], 'name'=>$nom.' '.$_POST['prenom'], 'phone'=>$_POST['telephone'], 'delegue'=>$_POST['delegue'], 'labo'=>$_POST['labo']];
        Mail::to($alert['email'])->send(new AlertInscription($alert));
        Mail::to($detail['email'])->send(new ConfirmationInscription($detail));*/
        if (session()->has('inscription')) {
        } else {
            session()->put('inscription', $nom . " " . $_POST['name'] . " votre pré-inscription  a été enregistrée, vous recevrez un mail de confirmation");
            session()->put('color', "225500fa");
        }
    }

    return back();
});

//Route::post('/update-name/{id}', [InscriptionController::class, 'create'])->middleware(['auth']);

Route::post('/grade', function (Request $resq) {
    $get = DB::table('grades')->where('titre', $_POST['titre'])->first();

    if (empty($get)) {
        $gra = Grade::create([
            'titre' => $_POST['titre'],

        ]);
        $gra->save();
    }

    $get = DB::table('grades')->where('titre', $_POST['titre'])->first();
    return view('ajx.grade', ['grade' => $get]);
});


Route::post('/laboratoire', function (Request $resq) {
    $get = DB::table('laboratoires')->where('labo', $_POST['labo'])->first();

    if (empty($get)) {
        $gra = Laboratoire::create([
            'labo' => $_POST['labo'],

        ]);
        $gra->save();
    }

    $get = DB::table('laboratoires')->where('labo', $_POST['labo'])->first();
    return view('ajx.labo', ['labos' => $get]);
});

Route::get('/confirm-inscription/{id}', function ($id) {
    $nom = "";





    /*$alert = ['email'=>'armel2001@yahoo.fr',  'ordonateur'=>Auth::user()->name,  'name'=>$nom];
        Mail::to($alert['email'])->send(new ConfirmationPaiements($alert));
    //
         $confirm = ['email'=>$user->email,  'name'=>$nom];
   	Mail::to($confirm['email'])->send(new ConfirmInscription($confirm));*/
    return view('admin.confirm-inscription', ['id' => $id]);
})->middleware(['auth']);;

Route::post('/confirm-inscription/{id}', function ($id) {
    $user = DB::table('inscriptions')->where('id', $id)->first();
    EmailConfirmationInscription::dispatch($user);
    $confirmation = DB::table('inscriptions')
        ->where('id', $id)
        ->update([
            'confirmation_inscription' => 1,
            'ordonnateur' => Auth::user()->id,
            'montant' => $_POST['montant']
        ]);
    return redirect('/list-inscription');
})->middleware(['auth']);



Route::get('/email', function () {





    return view('email.inscription');;
});

Route::post('/specialiste', function (Request $resq) {
    $specialite = Specialite::create([
        'speciality' => $_POST['speciality'],

    ]);
    $get = DB::table('specialites')->where('speciality', $_POST['speciality'])->first();
    return view('ajx.specialite', ['spec' => $get]);
})->name('specialiste');

Route::get('/list-inscription', function () {
    $get = DB::table('inscriptions')->where('confirmation_inscription', 0)->paginate(40);

    return view('admin.listeinscription', ['inscript' => $get]);
})->middleware(['auth']);

Route::post('/list-inscription', function (Request $resq) {
    $get = DB::table('inscriptions')
        ->where("name", 'like', "%$resq->name%")
        ->orwhere("prenom", 'like', "%$resq->name%")
        ->paginate(40);

    return view('admin.listeinscription', ['inscript' => $get]);
})->middleware(['auth']);

Route::get('/list-abstract', function () {
    $get = DB::table('abstracts')->paginate(40);

    return view('admin.liste-abstract', ['inscript' => $get]);
})->middleware(['auth']);

Route::post('/list-abstract', function (Request $resq) {
    $get = DB::table('abstracts')
        ->where("name", 'like', "%$resq->name%")
        ->paginate(40);

    return view('admin.liste-abstract', ['inscript' => $get]);
})->middleware(['auth']);

Route::get('/list-des-inscris', function () {
    $get = DB::table('inscriptions')->where('confirmation_inscription', 1)->paginate(40);

    return view('admin.dejainscris', ['inscript' => $get]);
})->middleware(['auth']);

Route::post('/list-des-inscris', function (Request $resq) {
    $get = DB::table('inscriptions')->where('confirmation_inscription', 1)
        ->where("name", 'like', "%$resq->name%")->paginate(40);

    return view('admin.dejainscris', ['inscript' => $get]);
})->middleware(['auth']);

Route::get('/list-labo', function () {
    $get = DB::table('inscriptions')->where('labo', '!=', 'Aucun')->paginate(40);
    $labo = DB::table('laboratoires')->get();
    return view('admin.listelabo', ['inscript' => $get, 'labo' => $labo]);
})->middleware(['auth']);

Route::post('/list-labo', function () {
    $get = DB::table('inscriptions')->where('labo', '=', $_POST['labo'])->paginate(40);
    $labo = DB::table('laboratoires')->get();
    return view('admin.listelabo', ['inscript' => $get, 'labo' => $labo]);
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/list-delegue', function () {
    $get = DB::table('delegues')->paginate(40);

    return view('admin.delegue', ['inscript' => $get]);
})->middleware(['auth']);
Route::get('/qr-code', function () {

    return view('badge.badge-participant');
});

Route::get('/scan', function () {

    return view('badge.scan-qrcode');
});

Route::get('/liste-categorie', function(){
    $liste = array();/*DB::table('inscriptions')
                ->orderBy('name', 'asc')
                ->get();*/
    return view('admin.liste-par-categorie', ['inscription'=>$liste]);
});

Route::post('/liste-categorie', function(Request $request){

    $liste = DB::table('inscriptions')
                ->where('specialite', $request->speciality)
                ->get();
    return view('admin.liste-par-categorie', ['inscription'=>$liste]);
});

Route::get('/creer-badge/{idSpecialite}', function($idSpecialite){
    $inscription = DB::table('inscriptions')
            ->where('specialite', $idSpecialite)
            ->get();
/*!$pdf = PDF::loadView('badge.badge-participant', ['inscription'=>$inscription])
            ->setPaper('a4', 'portrait');
    return $pdf->stream();*/
   return view('badge.badge-participant', ['inscription'=>$inscription]);
});

Route::get('/inscription-delegue', function () {
    $get = DB::table('grades')->get();
    $labos = DB::table('laboratoires')->get();
    $specia = DB::table('specialites')->get();
    $delegue = DB::table('delegues')->get();

    return view('delegue', ['grades' => $get, 'specia' => $specia, 'labos' => $labos, 'delegue' => $delegue]);
});

Route::post('/save-delegue', function (Request $resq) {
    $verifie = DB::table('delegues')
        ->where('nom', $resq->nom)
        ->where('email', $resq->email)
        ->where('labo_id', $resq->labo_id)
        ->first();
    $nom = $_POST['nom'];
    if (!empty($verifie)) {
        if (session()->has('inscriptiondelegue')) {
            session()->put('inscriptiondelegue', $nom . " vous avez déjà été enrgistré");
            session()->put('color', "ff6600fa");
        } else {
            session()->put('inscriptiondelegue', $nom . " vous avez déjà été enrgistré");
            session()->put('color', "ff6600fa");
        }
    } else {
        //return $resq;
        $inscription = InscriptionDelegue::create([
            'titre' => $resq->titre,
            'nom' => $resq->nom,
            'email' => $resq->email,
            'labo_id' => $resq->labo_id,
            /*'stand'=>$_POST['stand'],
            'symposium'=>$_POST['symposium'],
            'publicite'=>$_POST['publicite'],
            'specialiste'=>$_POST['specialiste'],
            'medecin'=>$_POST['medecin'],
            'infirmier'=>$_POST['infirmier'],
            'etudiant'=>$_POST['etudiant'],*/


        ]);

        if (session()->has('inscriptiondelegue')) {
            session()->put('inscriptiondelegue', $nom . " vos informations ont bien été enregistrées");
            session()->put('color', "225500fa");
        } else {
            session()->put('inscriptiondelegue', $nom . " vos informations ont bien été enregistrées");
            session()->put('color', "225500fa");
        }


    }

    return back();
});

Route::get('/badge-delegue', function(){

});
Route::get('/service-annexe', function () {

    return view('comite-organisation');
});



Route::post('/save-enregistrer-service', function (Request $request) {
    /*session()->put('inscription', "Bien vouloir remplir tous les champs");
    session()->put('color', "6cb6e7fa");*/
    $service = DB::table('comite_organisations')
        ->where('name', $request->name)
        ->orWhere('email', $request->email)
        ->first();
    if (!empty($service)) {
        session()->put('inscription', $request->name . " a déjà été enregistré");
        session()->put('color', "ff6600fa");
    } else {
        $comite = ComiteOrganisation::create([
            'titre'=>$request->titre,
            'name'=>$request->name,
            'prenom'=>$request->prenom,
            'email'=>$request->email,
            'service'=>$request->service,
            'telephone'=>$request->telephone,
        ]);
        session()->put('inscription', $request->name." a bien été enregistré");
        session()->put('color', "225500fa");
    }
    return back();
});
Route::post('/salle-stand', function (Request $request) {
    $scan = ScanPresence::create([
        'info_participant'=>$request->info_participant,
        'salle'=>$request->salle,
    ]);
    return back();
});


require __DIR__ . '/auth.php';
