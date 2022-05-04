<?php

namespace App\Http\Controllers\API;

use App\Enums\StatutDemandeEnum;
use App\Http\Controllers\Controller;
use App\Models\DemandeLivraison;
use App\Models\Device;
use App\Models\StatutDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemandeLivraisonController extends Controller
{
    var  $token;
    public function fetch(Request $request){
        $demande = new DemandeLivraison();
        $demande->ref_operation = $request->reference;
        $demande->code_agence = $request->agencyCode;
        $demande->nom_client = $request->customerName;
        $demande->tel_client = $request->customerPhone;
        $demande->adresse_livraison = $request->deliveryAddress;
        $demande->nom_beneficiaire = $request->payeeName;
        $demande->tel_beneficiaire = $request->payeePhone;
        $demande->montant_livraison = $request->amountToDeliver;
        $demande->nombreBillet10000 = $request->bnkNotes10000Number;
        $demande->nombreBillet5000 = $request->bnkNotes5000Number;
        $demande->frais_livraison= $request->commissionAmount;
        $demande->lien_gps = $request->gpsLink;
        $demande->date_reception= $request->dateOfReceipt;
        $demande->date_livraison= $request->requestDate;
        $demande->voucher = $request->deliveryCode;
        $demande->user_id='1';
        $demande->created_at=now();
        $demande->updated_at=now();
        try {
            $demande->save();
            $responseStatut = [
                'code'=>'200',
                'status'=>'SUCCESS',
                'message'=>'The Delivery has been received',
            ];
            return Response()->json($responseStatut,200);

        }catch (\Exception $exception){
            $responseStatut = [
                'code'=>'500',
                'status'=>'ERROR',
                'message'=>'Error in receiving the delivery request',

            ];
            return Response()->json($responseStatut, 500);
        }

    }

//    public function fetch1()
//    {
//        $response = Http::get('https://bocashdelivery.ventis.group/api/v1/livraison');
//
//        $livraisons = json_decode($response->body());
//        foreach($livraisons as $livraison){
//            $demande = new DemandeLivraison();
//            $demande->ref_operation = $livraison->ref_operation;
//            $demande->code_agence = $livraison->code_agence;
//            $demande->nom_client = $livraison->nom_client;
//            $demande->prenom_client = $livraison->prenom_client;
//            $demande->adresse_livraison = $livraison->adresse_livraison;
//            $demande->nom_beneficiaire = $livraison->nom_beneficiaire;
//            $demande->prenom_beneficiaire = $livraison->prenom_beneficiaire;
//            $demande->tel_beneficiaire = $livraison->tel_beneficiaire;
//            $demande->montant_livraison = $livraison->montant_livraison;
//            $demande->nombreBillet5000 = $livraison->nombreBillet5000;
//            $demande->commission = $livraison->commission;
//            $demande->lien_gps = $livraison->answers->answer_dlien_gps;
//            $demande->date_reception = $livraison->date_reception;
//            $demande->heure_reception = $livraison->heure_reception;
//            $demande->date_livraison = $livraison->date_livraison;
//            $demande->heure_livraison = $livraison->heure_livraison;
//            return Response()->json([
//                'status'=>'OK',
//                'message_tilte'=>'Succès',
//                'message_content'=>'La liste des livraisons',
//            ], 200);
//            $demande->save();
//        }
//    }

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
            'statut_demande_id'=>'nullable',
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


    public function listLivraison(Request $request){
       $listLivraison = DemandeLivraison::where('agent_livreur_id', $request->agent_livreur_id)
           ->where('statut_demande_id', DEMANDE_ASSIGNEE)
            ->get();
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

    public function notification(Request $token){
        $SERVER_API_KEY = 'AAAAgr7iOR8:APA91bE_QmF1co-htcVgK6HwrgYRUp6a5JBNkA-YV4ArCIVairMPDDbGcvwuAI_colGobLj-mB6GW92l8KbC4ijFn9KhmUvfiWmlggSMRj5yKKyVLGCLnXlvW-mG_ktXaSFfQvsxc6Ho';
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token1 = $token;
        $notification = [

            "title" => 'Cash delivery notification',

            "body" => 'Vous avez une nouvelle assignation de livraison',

            "sound"=> "default" // required for sound on ios

        ];
        $extraNotificationData = [
            'message' => $notification, 'data'=>'dd'

        ];
        $fcmNotification = [
            'to'=>$token1,
            'notification'=> $notification,
            'data'=>$extraNotificationData
        ];

        $dataString = json_encode($fcmNotification);

        $headers = [

            'Authorization: key=' . $SERVER_API_KEY,

            'Content-Type: application/json',

        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $fcmUrl);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
        return $response;

    }


    public function updateStatusLivraison(Request $request){
        $livraison = DemandeLivraison::find($request->id);
        if($livraison) {
            $livraison->statut_demande_id = DEMANDE_ENCOURS;
            $livraison->save();
            return Response()->json([
                'statut'=>'OK',
                'message_title'=>'Succès',
                'message_content'=>'modifié avec succès',
                'livraison'=>$livraison,
            ] ,200);
        }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Echec',
            'message_content'=>'Echec de Modification ',
        ]);

    }




    public function updateStatusAnnule(Request $request){
        $livraison = DemandeLivraison::find($request->id);

        if($livraison) {
            $livraison->statut_demande_id = DEMANDE_ANNULEE;
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


    public function updateStatusEffectue(Request $request){
        $livraison = DemandeLivraison::where('id',$request->id)
            ->where('statut_demande_id', DEMANDE_ENCOURS)->first();
        if($livraison) {
            $livraison->statut_demande_id = DEMANDE_EFFECTUEE;
            $livraison->save();
            return Response()->json([
                'statut'=>'OK',
                'message_title'=>'Succès',
                'message_content'=>'modifié avec succès',
                'livraioson'=>$livraison
            ] ,200);
        }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Echec',
            'message_content'=>'Echec de Modification ',
            'livraioson'=>$livraison
        ], status: 404);

    }




    public function historiqueLivraison(Request $request)
    {
        $historiqueLivraison = DemandeLivraison::where('agent_livreur_id', $request->agent_livreur_id)
            ->where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->get();
        if ($historiqueLivraison) {
            return Response()->json([
                'status' => 'OK',
                'message_tilte' => 'Succès',
                'message_content' => 'La liste des livraisons',
                'list_livraison' => $historiqueLivraison,
            ], 200);
        } else {
            return Response()->json([
                'status' => 'NON_OK',
                'message_tilte' => 'Erreur',
                'message_content' => 'Liste vide',
            ]);
        }
    }
    public function livraisonsEnCours(Request $request)
    {
        $livraisonsEnCours = DemandeLivraison::where('agent_livreur_id', $request->agent_livreur_id)
            ->where('statut_demande_id', DEMANDE_ENCOURS)
            ->get();

        if ($livraisonsEnCours) {
            return Response()->json([
                'status' => 'OK',
                'message_tilte' => 'Succès',
                'message_content' => 'La liste des livraisons',
                'list_livraison' => $livraisonsEnCours,
            ], 200);
        } else {
            return Response()->json([
                'status' => 'NON_OK',
                'message_tilte' => 'Erreur',
                'message_content' => 'Liste vide',
            ]);
        }
    }


}
