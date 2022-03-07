<?php

namespace App\Http\Controllers;

use App\Models\AgentLivreur;
use App\Models\Demande;
use App\Models\DemandeLivraison;
use App\Models\Livraison;
use App\Models\Livreur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use StatutLivraison;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()

    {
        $demande_livraisons = DemandeLivraison::all();
        return view('demandes.index', compact('demande_livraisons',));
    }


    public static function nombre_nouvelle_demande(){
        $nombre_nouvelle_demande = DemandeLivraison::where('statut_livraison', 'INITIEE')->count();
        return $nombre_nouvelle_demande;

    }


    public static function nombreT_nouvelle_demande(){
        $nombre_nouvelle_demande = DB::table('demande_livraisons')->count();
        return $nombre_nouvelle_demande;

    }


    public static function chiffreAffaires(){
        $chiffre_affaires = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
           $montant = $demande->montant_livraison;
           $chiffre_affaires +=$montant;

        }

        return $chiffre_affaires;

    }



    public static function commission(){
        $commission = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $montant = $demande->commission;
            $commission +=$montant;

        }

        return $commission;

    }


    public static function montantMax(){
        $montant = [];
        $i = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $i++;
            $montant = [$demande->montant_livraison];

        }
        $montant_max = max($montant);
        return $montant_max;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(int $id)
    {
//        dd($id);
//        $demande_livraisons = DB::table('demande_livraisons')->whereId($id)->first();
        $demande_livraisons = DemandeLivraison::whereId($id)->first();

        return view('demandes.show', compact('demande_livraisons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     */
    public function edit($id)
    {
        $demande_livraisons = DemandeLivraison::findOrFail($id);

        return view('demandes.edit', compact('demande_livraisons'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {

         $request->validate([
          'livreur_id' => 'required|exists:livreurs,id',
          'agent_id' => 'required|exists:agent_livreurs,id',
        ]);

        $agence = Livreur::findOrFail($request->livreur_id)->agence;
//        $agent = AgentLivreur::findOrFail($request->agent_id)->nomAgent;

//        dd($demande);

        $demande_livraison = DemandeLivraison::findOrfail($id);
        $demande_livraison->livreur_id = $request->livreur_id;
        $demande_livraison->agent_livreur_id = $request->agent_id;

//        $livraison->user_id = 2;
        $demande_livraison->statut_livraison = 'EN COURS';
        $demande_livraison->save();

        return redirect()->route('demandes.index')->with('success','Livraison Assignée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        DemandeLivraison::whereId($id)->delete();

        return redirect()->route('demandes.index');
    }


    public function getLivraisonEnCoursLivreur(){
            global $montantLivreur;
        $livraisons = DemandeLivraison::where('statut_livraison','En Cours' );
        foreach ($livraisons as $livraison){
            $montant = $livraison->montant_livraison;
            $livreur = $livraisons->livreur_id->livra;
        }
    }


    public function montantLivraisonEnCours(){
        $tab = [1,2,3];
        $col = collect($tab)->sum(function ($t){
            return $t;
        });
        dd($this->montantLivraisonEnCours());
    }


    public function  recherche(){
        $recherche = $_GET['recherche'];
        $demandes = DemandeLivraison::where('ref_opreration', 'like', '%'.$recherche.'%')->get();
        return view('demandes.recherche', compact('demandes'));
    }


    public function sommeLivraisons($id){
        $montantTotalLivraison = 0;
       $livraisons = DemandeLivraison::where('livreur_id', $id)->where('statut_livraison','EN COURS')->get();
       foreach ($livraisons as $livraison){
           $montant = $livraison->montant_livraison;
           $montantTotalLivraison +=$montant;
           return $montantTotalLivraison;
       }
    }

    public function caution($id){
        $livreur = Livreur::where('$id', $id);
        $caution = $livreur->cautionLivreur;
        return $caution;
    }
    public function montantDemandeEnCours(){

    }
}
