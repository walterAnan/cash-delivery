<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\AgentLivreur;
use App\Models\DemandeLivraison;
use DB;
use Illuminate\Http\Request;

class AgentLivreurController extends Controller
{
    public  function  testLogin(Request $request){
        $login = $request->login;
        $password = $request->password;

        return response()->json([
            'message' => 'Test OK',
            'login' => $login
        ]);
    }

    public function authentif(Request $request){
        $codeSecret = $request->codeAgent;
        $numeroTel = $request->telephoneAgent;
        $agent = AgentLivreur::where('codeAgent', $codeSecret)->where('telephoneAgent', 'LIKE', '%'.$numeroTel)->first();
        if($agent) {
            return Response()->json([
                'status'=>'OK',
                'message_tilte'=>'Succès',
                'message_content'=>'Vous etes connectez',
                'agent'=> $agent,

            ], 200);
        }

        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Erreur',
            'message_content'=>'les informations sont incorrectes',
        ]);
    }

    public function updateStatusDispo(Request $request){
        $agent = AgentLivreur::find($request->agent_id);
        if($agent) {
            $agent->estDisponible = true;
            $agent->save();
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
            'disponibilite'=>$agent->estDisponible,
        ]);

    }

    public function updateStatusIndispo(Request $request){
        $agent = AgentLivreur::find($request->agent_id);

        if($agent) {
            $agent->estDisponible = false;
            $agent->save();
            return Response()->json([
                'statut'=>'OK',
                'message_title'=>'Succès',
                'message_content'=>'modifié avec succès',
                'disponibilite'=>$agent->estDisponible,
            ] ,200);
        }
        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Echec',
            'message_content'=>'Echec de Modification ',
        ]);

    }
    public function checkOtp(Request $request){
        $demande_id = $request->demande_id;
        $otp = $request->otp;
        $demande = DemandeLivraison::where('id', $demande_id)->where('voucher', $otp)->where('statut_demande_id', DEMANDE_ENCOURS)->first();
        if($demande) {
            return Response()->json([
                'status'=>'OK',
                'message_tilte'=>'Succès',
                'message_content'=>'Il est éffectivement le bénéficiaire',
                'livraison'=>$demande,

            ], 200);
        }

        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Erreur',
            'message_content'=>'les informations sont incorrectes',
            'livraison'=>$demande,
        ], status: 404);
    }
}
