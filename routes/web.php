<?php

use App\Http\Controllers\AgenceController;
use App\Http\Controllers\AgentLivreurController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\LivraisonController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\Users\CreateUser;
use App\Http\Livewire\Users\EditUser;
use App\Http\Livewire\Users\ShowUser;
use App\Http\Livewire\Users\UpdateUser;
use App\Http\Livewire\Users\Users;
use App\Models\AgentLivreur;
use Illuminate\Support\Facades\Route;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/test', function () {
    return view('test');
});


Route::get('/test1', [DemandeController::class, 'livreursPro']);

/**
 * Les routes accessibles uniquement par les administrateurs
 */
Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth:sanctum', 'auth.admin'])
    ->group(function() {

        // Route qui accède à la liste des utilisateurs
        Route::get('/users', Users::class)->name('users.index');

        // Route qui accède à la vue permettant de créer un utilisateur
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');

        // Route qui accède à la vue affichant les détails d'un utilisateur donné
        Route::get('/users/{user}', ShowUser::class)->name('users.show');

        // Route qui accède à la vue permettant d'éditer les infos d'un utilisateur donné
        Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');

        Route::get('/users/{user}/update', UpdateUser::class)->name('users.update');



    });

Route::get('/livraison', function () {
    return view('livraisons.index');
});




// Routes des Crud

//Livraison



Route::group([
    'middleware' => ['auth:sanctum']
],
    function(){

        Route::get('/activites',  [DemandeController::class, 'activites'])->name('activites');
        Route::POST('/data_activites',  [DemandeController::class, 'data'])->name('data_activites');


        Route::get('/dashboard', function () {

            $chart_options = [
                'chart_title' => '   Répartition des demandes en fonction de leur statut',
                'report_type' => 'group_by_relationship',
                'model' => 'App\Models\DemandeLivraison',
                'relationship_name' => 'statutDemande',
//                'conditions'            => [
//                    ['name' => 'INITIEE', 'condition' => 'statut_demande_id = 1',  'color' => 'black', 'fill' => true],
//                    ['name' => 'ASSIGNEE', 'condition' => 'statut_demande_id = 2', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'EN COURS', 'condition' => 'statut_demande_id = 3', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'EFFECTUEE', 'condition' => 'statut_demande_id = 4', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'ANNULEE', 'condition' => 'statut_demande_id = 5', 'color' => 'blue', 'fill' => true],
//                ],
                'group_by_field' => 'libelle',
                'aggregate_function' => 'count',
//                'group_by_period' => 'day',
                'chart_type' => 'pie',
                'chart_color'=>'60, 179, 113'
            ];
            $chart1 = new LaravelChart($chart_options);

            return view('dashboard', compact('chart1'));
        })->name('dashboard');


        Route::resource('demandes', LivraisonController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'store', 'destroy', 'generate'
        ]);


        Route::resource('demandes', DemandeController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'store', 'destroy',
        ]);



        Route::resource('agences', AgenceController::class);
        Route::resource('generate', PDFController::class);

//        Route::as('agences.')
//            ->controller(AgenceController::class)
//            ->middleware('auth.admin')
//            ->group( function () {
//                Route::get('agences/', 'index')->name('index');
//
//                Route::get('agences/show', 'index')->name('show');
//
//                Route::get('agences/create', 'create')->name('create');
//
//                Route::post('agences/store', 'store')->name('store');
//
//                Route::get('agences/{agence}/edit', 'edit')->name('edit');
//
//                Route::put('agences/{agence}', 'update')->name('update');
//
//                Route::delete('agences/{agence}/destroy', 'destroy')->name('destroy');
//        });



        Route::resource('agents', AgentLivreurController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'store', 'destroy'
        ]);

        Route::resource('incidents', IncidentController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'store', 'destroy'
        ]);


        Route::resource('livreurs', LivreurController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'destroy', 'store',
        ]);
        Route::resource('devices', DeviceController::class)->only([
            'index', 'show', 'edit', 'create', 'update', 'destroy', 'store'
        ]);

    }
);

