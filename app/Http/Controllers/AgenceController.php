<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\StatutAgence;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $agences = Agence::all();
        return view('agences.index', compact('agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $status = $this->getAllStatut();
        return view('agences.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
//            'codeAgence' => 'required',
            'nomAgence' => 'required',
            'adresseAgence' => 'required',
            'statut_agence_id' => 'required|exists:statut_agences,id',
        ]);
        $agence = new Agence();
        $agence->codeAgence = 'AG_' . Str::random(8);
        $agence->nomAgence = $request->nomAgence;
        $agence->adresseAgence = $request->adresseAgence;
        $agence->statut_agence_id = $request->statut_agence_id;

//

        $agence->save();
        return redirect()->route('agences.index')->with('success','demande created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $agence = Agence::findOrFail($id);
        return view('agences.show', compact('agence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agence = Agence::find($id);
        return view('agences.edit', compact('agence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $agence)
    {
        $validatedData = $request->validate([
            'nomAgence' => 'required',
            'adresseAgence' => 'required',
        ]);
        Agence::where('id', $agence)->update($validatedData);

        return redirect()->route('agences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $id->agence->destroy();
//
//        return redirect()->route('agences.index')
//            ->withSuccess(__('Agences deleted successfully.'));
    }


    public function getAllStatut()
    {
        return StatutAgence::all();
    }
}
