<?php

namespace App\Http\Controllers;

use App\Models\DemandeLivraison;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class StatistiqueController extends Controller
{
    public function graphique(){

        $chart_options = [
            'chart_title' => '   Répartition agents livreurs en fonction de leur localité',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\AgentLivreur',
            'relationship_name' => 'localite',
//                'conditions'            => [
//                    ['name' => 'INITIEE', 'condition' => 'statut_demande_id = 1',  'color' => 'black', 'fill' => true],
//                    ['name' => 'ASSIGNEE', 'condition' => 'statut_demande_id = 2', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'EN COURS', 'condition' => 'statut_demande_id = 3', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'EFFECTUEE', 'condition' => 'statut_demande_id = 4', 'color' => 'blue', 'fill' => true],
//                    ['name' => 'ANNULEE', 'condition' => 'statut_demande_id = 5', 'color' => 'blue', 'fill' => true],
//                ],
            'group_by_field' => 'ville',
            'aggregate_function' => 'count',
//                'group_by_period' => 'day',
            'chart_type' => 'bar',
            'chart_color'=>'60, 179, 113'
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('stats.stattics', compact('chart1'));
    }


    public function statNum()
    {

        $demandeEffecAnnuelles = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereYear('created_at', date('Y'))->count();
        $demandeIniAnnuelles = DemandeLivraison::where('statut_demande_id', DEMANDE_ANNULEE)->whereYear('created_at', date('Y'))->count();
        $commission = 0;
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereYear('created_at', Carbon::now()->month)->get();
        foreach ($demandes as $demande) {
            $montant = $demande->montant_livraison;
            $commission += $montant;

        }

    }
}
