<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Demande;
use App\Models\DemandeLivraison;
use App\Models\Livreur;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $agences = Agence::all();
        return view('livreurs.create', compact('agences'));
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
            'prenomResponsable' => 'nullable',
            'raisonSociale' => 'required',
            'telephoneResponsable' => 'required',
            'adresseLivreur' => 'required',
            'emailLivreur' => 'required',
            'cautionLivreur' => 'required|numeric|gte:200000',
            'modeCommission' => ['string', Rule::in(['TAUX', 'MONTANT_FIX'])],
//            'typeLivreur' => ['string', Rule::in(['INTERNE', 'EXTERNE'])],
            'valeurCommission' => Rule::when($request->modeCommission == 'TAUX', 'required|numeric|between:10,90', 'required|numeric|between:1000,100000'),
            'telephoneLivreur' => 'required',
            'agence_id' => 'required',
            'control_livraison_id'=>'required|exists:control_livraisons,id'
        ], [
            'nomResponsable.required' => 'Champ Obligatoire',
            'raisonSociale.required' =>'Champ Obligatoire',
            'telephoneResponsable.required' =>'Champ Obligatoire',
            'adresseLivreur.required' =>'Champ Obligatoire',
            'cautionLivreur.required' =>'Champ Obligatoire',
            'cautionLivreur.gte' =>'La caution doit être supérieur à 200.000',
            'commisssionLivreur.required' =>'Champ Obligatoire',
            'telephoneLivreur.required' =>'Champ Obligatoire',
            'agence_id.required' =>'Champ Obligatoire',
            'control_livraison_id.required' =>'Champ Obligatoire',
            'valeurCommission.required' =>'Champ Obligatoire',
            'valeurCommission.between' =>"La valeur de la commission doit être comprise entre 10 et 90 si vous choissisez l'option taux",
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
        $livreur->modeCommission = $request->modeCommission;
        $livreur->valeurCommission = $request->valeurCommission;
        $livreur->agence_id = $request->agence_id;
        $livreur->control_livraison_id = $request->control_livraison_id;


        $livreur->save();

        return redirect()->route('livreurs.index')->with('success','Livreur créé avec succès!');
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
        $agences = Agence::all();
        return view('livreurs.edit', compact(['livreur', 'agences']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $livreur)
    {

        $validator = Validator::make($request->all(), [
            'nomResponsable' => 'required',
            'prenomResponsable' => 'nullable',
            'raisonSociale' => 'required',
            'telephoneResponsable' => 'required',
            'adresseLivreur' => 'required',
            'emailLivreur' => 'required',
            'cautionLivreur' => 'required|numeric|gte:200000',
            'modeCommission' => ['string', Rule::in(['TAUX', 'MONTANT_FIX'])],
            'valeurCommission' => Rule::when($request->modeCommission == 'TAUX', 'required|numeric|between:10,90', 'required|numeric|between:1000,100000'),
            'telephoneLivreur' => 'required',
            'agence_id' => 'required',
            'control_livraison_id'=>'required|exists:control_livraisons,id'
        ], [
            'nomResponsable.required' => 'Champ Obligatoire',
            'raisonSociale.required' =>'Champ Obligatoire',
            'telephoneResponsable.required' =>'Champ Obligatoire',
            'adresseLivreur.required' =>'Champ Obligatoire',
            'cautionLivreur.required' =>'Champ Obligatoire',
            'cautionLivreur.gte' =>'La caution doit être supérieur à 200.000',
            'commisssionLivreur.required' =>'Champ Obligatoire',
            'telephoneLivreur.required' =>'Champ Obligatoire',
            'agence_id.required' =>'Champ Obligatoire',
            'control_livraison_id.required' =>'Champ Obligatoire',
            'valeurCommission.required' =>'Champ Obligatoire',
            'valeurCommission.between' =>"La valeur de la commission doit être comprise entre 10 et 90 si vous choissisez l'option taux",
        ])->validate();;


        $livreur = Livreur::where('id', $livreur)->update($validator);

        return redirect()->route('livreurs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livreur $livreur)
    {

        $livreur->delete();
        return redirect()->route('livreurs.index')->withSuccess(__('livreur supprimé avec succès.'));
    }



}
