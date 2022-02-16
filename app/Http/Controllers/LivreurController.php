<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Livreur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livreurs = Livreur::all();
        return view('livreurs.index', compact('livreurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livreurs.create');
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
            'nomResponsable' => 'required',
            'prenomResponsable' => 'required',
            'raisonSociale' => 'required',
            'telephoneResponsable' => 'required',
            'adresseLivreur' => 'required',
            'emailLivreur' => 'required',
            'cautionLivreur' => 'required|numeric',
            'telephoneLivreur' => 'required',
            'agence_id' => 'required',
        ]);

        $livreur = new Livreur();

        $livreur->codeLivreur = Str::random(8);
        $livreur->nomResponsable = $request->nomResponsable;
        $livreur->prenomResponsable = $request->prenomResponsable;
        $livreur->raisonSociale = $request->raisonSociale;
        $livreur->telephoneResponsable = $request->telephoneResponsable;
        $livreur->adresseLivreur = $request->adresseLivreur;
        $livreur->emailLivreur = $request->emailLivreur;
        $livreur->cautionLivreur = $request->cautionLivreur;
        $livreur->telephoneLivreur = $request->telephoneLivreur;
        $livreur->agence_id = $request->agence_id;

        $livreur->save();

        return redirect()->route('livreurs.index')->with('success','Livreur créer successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livreur = Livreur::findOrFail($id);
        return view('livreurs.show', compact('livreur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livreur = Livreur::findOrFail($id);

        return view('livreurs.edit', compact('livreur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $livreur)
    {

        $validatedData=$request->validate([
            'nomResponsable'=>'required',
            'prenomResponsable' => 'required',
            'raisonSociale'=>'required',
            'telephoneResponsable'=>'required',
            'adresseLivreur'=>'required',
            'emailLivreur'=>'required',
            'cautionLivreur'=>'required',
            'telephoneLivreur'=>'required',

        ]);

        Livreur::where('id', $livreur)->update($validatedData);

        return redirect()->route('livreurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
