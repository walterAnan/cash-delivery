<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\AgentLivreur;
use App\Models\DemandeLivraison;
use App\Models\Device;
use DB;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class AgentLivreurController extends Controller
{
    public  function  appareilAuth(Request $request){
        $imei1 = $request->imei1;
        $imei2 = $request->imei2;

//        dd($imei);
//        $imei = substr($imei, 1, -1);
//        $imei = explode(",",$imei);
//        $imei1 = $imei[0];
//        $imei2 = substr($imei[1], 1);
        $appareil = Device::where('imei', $imei1)->orwhere('imei', $imei2)->first();

        if($appareil){
            return response()->json([
                'status'=>'OK',
                'message' => 'Test OK',
                'message_title' => 'succes',
                'message_content' => 'Cet appareil existe dans notre base de donnée',
                'login' => $imei1
            ],200);

        }else {
            return Response()->json([
                'status'=>'NON_OK',
                'message_tilte'=>'Erreur',
                'message_content'=>'cet appreil n\'existe pas dans notre  base de donnée',
                'login' => $imei1
            ]);
        }

    }

    public function authentif(Request $request){
        $codeSecret = $request->codeAgent;
        $numeroTel = $request->telephoneAgent;
        $agent = AgentLivreur::where('codeAgent', $codeSecret)->where('telephoneAgent', 'LIKE', '%'.$numeroTel)->first();
        if($agent) {
            return Response()->json([
                'status'=>'OK',
                'message_title'=>'Succès',
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



    public function tokenStorage(Request $request){
        $agent = AgentLivreur::findOrFail($request->id);
        if ($agent){
                $agent->token = $request->token;
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
            'message_content'=>'Echec de Modification '
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
