<?php

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\api\InscriptionController;
use App\Http\Controllers\api\ParametreController;
use App\Http\Controllers\api\ProgrammeController;
use App\Http\Controllers\ReclamationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(ProgrammeController::class)->group(function () {
    Route::get('get-programme', 'getAllsession')->middleware('throttle:api');
    Route::get('get-details-programme/{communicationSalleId}', 'getDetailProgramme')->middleware('throttle:api');
    Route::get('get-intervenants', 'allIntevenants')->middleware('throttle:api');

});

Route::controller(ParametreController::class)->group(function () {
    Route::get('get-all-specialite', 'allSpecialite')->middleware('throttle:api');
    Route::get('get-all-grades', 'allSgrade')->middleware('throttle:api');
    Route::get('get-all-labo', 'allLabo')->middleware('throttle:api');
});

Route::controller(AbstractController::class)->group(function () {
    Route::post('abstract', 'abstractSave');
});

Route::controller(InscriptionController::class)->group(function () {
    Route::post('save-inscription', 'saveInscription')->middleware('throttle:api');
    Route::post('inscription', 'inscriptionMobile')->middleware('throttle:api');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ═══ ROUTES RÉCLAMATION ═══════════════════════════════════════════════════════
// Permet à tous les utilisateurs de soumettre une réclamation via un formulaire
Route::controller(ReclamationController::class)->group(function () {
   
    // Traite la soumission du formulaire
    Route::post('/reclamation', 'store');
    
    // Admin: Voir la liste des réclamations (protégé par middleware auth)
//    / Route::get('/admin/reclamations', 'index')->middleware('auth')->name('reclamations.index');
    
    // Admin: Voir les détails d'une réclamation
    // Route::get('/admin/reclamations/{id}', 'show')->middleware('auth')->name('reclamations.show');
    
    // Admin: Mettre à jour le statut d'une réclamation
    // Route::patch('/admin/reclamations/{id}/status', 'updateStatus')->middleware('auth')->name('reclamations.updateStatus');
});

Route::get('/test', function () {
    return response()->json(['message' => 'API OK']);
});
