<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DemandeLivraison;
use Illuminate\Http\Request;

class DemandeLivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demande_livraisons = DemandeLivraison::all();
        return response()->json($demande_livraisons);
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


    public function store(Request $request)
    {
        $nouvelleDemandeLivraison = new DemandeLivraison([
            'ref_operation' => $request->get('ref_operation'),
            'code_agence' => $request->get('code_agence'),
            'nom_client' => $request->get('nom_client'),
            'prenom_client' => $request->get('prenom_client'),
            'tel_client' => $request->get('tel_client'),
            'adresse_livraison' => $request->get('adresse_livraison'),
            'nom_beneficiaire' => $request->get('nom_beneficiaire'),
            'prenom_beneficiaire' => $request->get('prenom_beneficiaire'),
            'tel_beneficiaire' => $request->get('tel_beneficiaire'),
            'montant_livraison' => $request->get('montant_livraison'),
            'nombreBillet10000' => $request->get('nombreBillet10000'),
            'nombreBillet5000' => $request->get('nombreBillet5000'),
            'frais_livraison' => $request->get('frais_livraison'),
            'voucher' => $request->get('voucher'),
            'commission' => $request->get('commission'),
            'lien_gps' => $request->get('lien_gps'),
            'date_reception' => $request->get('date_reception'),
            'heure_reception' => $request->get('heure_reception'),
            'date_livraison' => $request->get('date_livraison'),
            'heure_livraison' => $request->get('heure_livraison'),
            'user_id' => $request->get('user_id'),

        ]);
        $nouvelleDemandeLivraison->save();


        return response()->json('Insertion avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demande_livraisons = DemandeLivraison::findOrFail($id);
        return response()->json($demande_livraisons);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $demande_livraisons = DemandeLivraison::findOrFail($id);

        $request->validate([
            'ref_operation'=>'required',
            'code_agence'=>'required',
            'nom_client'=>'required',
            'tel_client'=>'required',
            'adresse_livraison'=>'required',
            'nom_beneficiaire'=>'required',
            'prenom_beneficiaire'=>'required',
            'tel_beneficiaire'=>'required',
            'montant_livraison'=>'required',
            'billet_10000'=>'required',
            'billet_5000'=>'required',
            'frais_livraison'=>'required',
            'commission'=>'required',
            'voucher'=>'required',
            'lien_gps'=>'required',
            'date_reception'=>'required',
            'heure_reception'=>'required',
            'date_livraison'=>'required',
            'heure_livraison'=>'required',
            'livreur'=>'nullable',
            'agent_livreur'=>'nullable',
            'statut_livraison'=>'nullable',
            'code_utilisateur'=>'nullable',
        ]);

        $demande_livraisons->ref_operation = $request->get('ref_operation');
        $demande_livraisons->code_agence = $request->get('code_agence');
        $demande_livraisons->nom_client = $request->get('nom_client');
        $demande_livraisons->tel_client = $request->get('tel_client');
        $demande_livraisons->adresse_livraison = $request->get('adresse_livraison');
        $demande_livraisons->nom_beneficiaire = $request->get('nom_beneficiaire');
        $demande_livraisons->prenom_beneficiaire = $request->get('prenom_beneficiaire');
        $demande_livraisons->tel_beneficiaire = $request->get('tel_beneficiaire');
        $demande_livraisons->montant_livraison = $request->get('montant_livraison');
        $demande_livraisons->billet_10000 = $request->get('billet_10000');
        $demande_livraisons->billet_5000 = $request->get('billet_5000');
        $demande_livraisons->frais_livraison = $request->get('frais_livraison');
        $demande_livraisons->commission = $request->get('commission');
        $demande_livraisons->voucher = $request->get('voucher');
        $demande_livraisons->lien_gps = $request->get('lien_gps');
        $demande_livraisons->date_reception = $request->get('date_reception');
        $demande_livraisons->heure_reception = $request->get('heure_reception');
        $demande_livraisons->date_livraison = $request->get('date_livraison');
        $demande_livraisons->heure_livraison = $request->get('heure_livraison');

        $demande_livraisons->save();

        return response()->json([$demande_livraisons]);
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


    public function listLivraison(Request $id){
       $listLivraison = DemandeLivraison::where('agent_livreur_id', $id->agent_livreur_id)->get();
       if ($listLivraison){
           return Response()->json([
               'status'=>'OK',
               'message_tilte'=>'Succès',
               'message_content'=>'La liste des livraisons',
               'list_livraison'=> $listLivraison,
           ], 200);
       }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Erreur',
            'message_content'=>'Liste vide',
        ]);
    }
    public function updateStatusLivraison(Request $request){
        $livraison = DemandeLivraison::find($request->id);

        if($livraison) {
            $livraison->statut_livraison = "EN COURS";
            $livraison->save();
            return Response()->json([
                'statut'=>'OK',
                'message_title'=>'Succès',
                'message_content'=>'modifié avec succès'
            ] ,200);
        }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Echec',
            'message_content'=>'Echec de Modification ',
        ]);

    }


    public function historiqueLivraison(Request $id){
        $historiqueLivraison = DemandeLivraison::where('agent_livreur_id', $id->agent_livreur_id)->where('statut_livraison', 'like', 'TERMINEE')->get();
        if ($historiqueLivraison){
            return Response()->json([
                'status'=>'OK',
                'message_tilte'=>'Succès',
                'message_content'=>'La liste des livraisons',
                'list_livraison'=> $historiqueLivraison,
            ], 200);
        }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Erreur',
            'message_content'=>'Liste vide',
        ]);
    }
}
