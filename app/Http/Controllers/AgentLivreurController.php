<?php

namespace App\Http\Controllers;

use App\Models\AgentLivreur;
use App\Models\Livreur;
use App\Models\Localite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AgentLivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent_livreurs = AgentLivreur::with('localite')->get();

        return view('agent_livreurs.index', compact('agent_livreurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $livreurs = $this->getAllLivreurs();
        $localites = $this->getAllLocalites();
        return view('agent_livreurs.create', compact(['livreurs', 'localites']))->with('success','Item created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeAgent',
            'nomAgent' => 'required',
            'prenomAgent' => 'required',
            'telephoneAgent'=> 'required',
            'adresseAgent' => 'required',
//            'cautionAgent' => 'required',
            'livreur_id' => 'required',
            'localite_id' => ['required'],
            //'statut_agence_id' => 'required|exists:statut_agences,id',
        ],
        [
            'localite_id.required' => 'Veuillez sélectionner une ville'
        ]);

        $agent = new AgentLivreur();

        $agent->codeAgent = 'AGT_' . Str::random(8);
        $agent->nomAgent = $request->nomAgent;
        $agent->prenomAgent = $request->prenomAgent;
        $agent->telephoneAgent = $request->telephoneAgent;
        $agent->adresseAgent = $request->adresseAgent;
        $agent->livreur_id = $request->livreur_id;
        $agent->localite_id = $request->localite_id;

//        dd($agent);
//
        $agent->save();
        return redirect()->route('agents.index')->with('success','Agent créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = AgentLivreur::findOrFail($id);
        return view('agent_livreurs.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = AgentLivreur::findOrFail($id);
        $livreurs = $this->getAllLivreurs();
        $localites = $this->getAllLocalites();
        return view('agent_livreurs.edit', compact(['agent', 'livreurs', 'localites']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agent)
    {
        $validatedData = $request->validate([
            'codeAgent',
            'nomAgent' => 'required',
            'prenomAgent' => 'required',
            'telephoneAgent'=> 'required',
            'adresseAgent' => 'required',
//            'cautionAgent' => 'required',
            'livreur_id' => 'required',
            'localite_id' => ['required'],
            //'statut_agence_id' => 'required|exists:statut_agences,id',
        ],
            [
                'localite_id.required' => 'Veuillez sélectionner une ville'
            ]);
        AgentLivreur::where('id', $agent)->update($validatedData);

        return redirect()->route('agents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AgentLivreur::whereId($id)->delete();
        return redirect()->route('agents.index')->withSuccess(__('Agent supprimé avec succès.'));
    }

    public function getAllLivreurs(){
        return Livreur::all();
    }

    public function getAllLocalites(){
        return Localite::all();
    }

}
