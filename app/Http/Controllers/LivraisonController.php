<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $livraisons = Livraison::all();
        return view('livraisons.index', compact('livraisons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('livraisons.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'agence_id',
            'livreur_id',
            'demande_id',
            'codeLivraison'=>'required|max:50|unique',
            'dateLivraison'=>'required',
            'statutlivraison'=>'required|max:255',
        ]);
        $livraison = Livraison::create($storeData);

        return redirect('/livraison')->with('completed', 'livaison créée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $livraison = Livraison::findOrFail($id);
        return view('livraisons.edit', compact('livraison'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $livraison = Livraison::findOrFail($id);
        $livraison->delete();

        return redirect('/livraisons')->with('completed', 'livraison supprimée');
    }
}
