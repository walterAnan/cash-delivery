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
Route::apiResource('apiDemande_livraisons',DemandeLivraisonController::class);
Route::apiResource('apiAgents',AgentLivreurController::class);

Route::post('login',AgentLivreurController::class.'@authentif');
Route::put('update_status',AgentLivreurController::class.'@updateStatus');
Route::put('update_status_livraison',DemandeLivraisonController::class.'@updateStatusLivraison');
Route::get('liste_livraison', DemandeLivraisonController::class.'@listLivraison');
Route::get('historique_livraison', DemandeLivraisonController::class.'@historiqueLivraison');
Route::post('check_otp',AgentLivreurController::class.'@checkOtp');

