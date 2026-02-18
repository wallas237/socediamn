<?php

use App\Http\Controllers\AbstractController;
use App\Http\Controllers\api\InscriptionController;
use App\Http\Controllers\api\ParametreController;
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
Route::controller(ParametreController::class)->group(function(){
    Route::get('get-all-specialite', 'allSpecialite')->middleware('throttle:api');
    Route::get('get-all-grades', 'allSgrade')->middleware('throttle:api');
    Route::get('get-all-labo', 'allLabo')->middleware('throttle:api');

});

Route::controller(AbstractController::class)->group(function(){
    Route::post('abstract', 'abstractSave');
}); 

Route::controller(InscriptionController::class)->group(function(){
    Route::post('save-inscription', 'saveInscription')->middleware('throttle:api');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
    return response()->json(['message' => 'API OK']);
});
