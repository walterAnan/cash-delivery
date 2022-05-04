<?php

use App\Http\Controllers\API\AgentLivreurController;
use App\Http\Controllers\API\DemandeLivraisonController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v1/livraison', DemandeLivraisonController::class.'@fetch');
Route::get('liste_livraison', DemandeLivraisonController::class.'@listLivraison');
Route::put('update_status_livraison', DemandeLivraisonController::class.'@updateStatusLivraison');
Route::put('update_status_effectue', DemandeLivraisonController::class.'@updateStatusEffectue');
Route::get('livraison_en_cours', DemandeLivraisonController::class.'@livraisonsEnCours');
Route::get('historique_livraison', DemandeLivraisonController::class.'@historiqueLivraison');
Route::get('dashboard_agent', DemandeLivraisonController::class.'@dashboradAgent');





Route::post('login',AgentLivreurController::class.'@authentif');
Route::post('token_info', AgentLivreurController::class.'@tokenStorage');
Route::put('update_status_dispo',AgentLivreurController::class.'@updateStatusDispo');
Route::put('update_status_indispo',AgentLivreurController::class.'@updateStatusIndispo');
Route::post('check_otp',AgentLivreurController::class.'@checkOtp');

