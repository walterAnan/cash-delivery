<?php

namespace App\Http\Controllers;

use App\Models\AgentLivreur;
use App\Models\Demande;
use App\Models\DemandeLivraison;
use App\Models\Livraison;
use App\Models\Livreur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
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
        return view('demandes.index', compact('demande_livraisons'));
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
    public function show($id)
    {
        $demande_livraisons = DemandeLivraison::findOrFail($id);
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
    public function update(Request $request, int $demandeLivraison)
    {

        $validatedData = $request->validate([
          'livreur_id' => 'required|exists:livreurs,id',
          'agent_id' => 'required|exists:agent_livreurs,id',
        ]);

        $agence = Livreur::findOrFail($request->livreur_id)->agence;
//        $agent = AgentLivreur::findOrFail($request->agent_id)->nomAgent;

//        dd($demande);

        $livraison = new DemandeLivraison();
        $livraison->agence_id = $agence->id;
        $livraison->agent_id = $request->agent_id;

//        $livraison->user_id = 2;

        $livraison->save();
        return redirect()->route('livraisons.index')->with('success','Livraison Assignée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Demande::whereId($id)->delete();

        return redirect()->route('demandes.index');
    }
}
