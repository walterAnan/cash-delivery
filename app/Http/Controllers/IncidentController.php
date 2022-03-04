<?php

namespace App\Http\Controllers;

use App\Models\DemandeLivraison;
use App\Models\Incident;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::all();
        return view('incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
//        dd($this->getAllLivraison());
        $demande_livraisons = $this->getAllLivraison();
        return view('incidents.create', compact('demande_livraisons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
           [
               'codeIncident'=>'required',
               'descriptionIncident'=>'required',
               'demande_livraison_id'=>'required',
           ]
    );

      $incident = new Incident();
      $incident->codeIncident = Str::random(5);
      $incident->descriptionIncident = $request->descriptionIncident;
      $incident->demande_livraison_id = $request->demande_livraison_id;

       $incident->save();
        return redirect()->route('incidents.index')->with('success','incident créé avec succès!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $incident = Incident::find($id);
        return view('incidents.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident= Incident::findOrFail($id);
        return view('incidents.edit', compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $incident)
    {
        $validatedData = $request->validate([
            'codeIncident' => 'required',
            'descriptionIncident' => 'required',
        ]);

        Incident::where('id', $incident)->update($validatedData);

        return redirect()->route('incidents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Incident::whereId($id)->delete();

        return redirect()->route('incidents.index')->withSuccess(__('Archivé supprimée avec succès.'));
    }

    public function getAllLivraison()
    {
        return DemandeLivraison::all();
    }
}
