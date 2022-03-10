<?php

namespace App\Http\Controllers\API;

use App\Enums\StatutAgent;
use App\Http\Controllers\Controller;
use App\Models\AgentLivreur;
use App\Models\DemandeLivraison;
use Illuminate\Http\Request;

class AgentLivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = AgentLivreur::all();
        return response()->json($agents);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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

    public  function  testLogin(Request $request){
        $login = $request->login;
        $password = $request->password;

        return response()->json([
            'message' => 'Test OK',
            'login' => $login
        ]);
    }


    public function authentif(Request $request){
        $codeSecret = $request->code_secret;
        $numeroTel = strval('+'."". $request->numero_tel);

        $agent = AgentLivreur::where([
            ['telephoneAgent', '=',''.$numeroTel .'' ],
            ['codeAgent', '=',''.$codeSecret .'']
        ])->first();

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
            $agent->statut_agent_livreur_id = StatutAgent::DISPONIBLE;
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
        ]);

    }

    public function updateStatusIndispo(Request $request){
        $agent = AgentLivreur::find($request->agent_id);

        if($agent) {
            $agent->statut_agent_livreur_id = StatutAgent::INDISPONIBLE;
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
        ]);

    }
    public function checkOtp(Request $request){
        $agent_id = $request->agent_id;
        $otp = $request->otp;
        $agent = DemandeLivraison::where([
            ['voucher', '=',''.$otp .'' ],
            ['agent_livreur_id', '=',''.$agent_id .'']
        ])->first();

        if($agent) {
            return Response()->json([
                'status'=>'OK',
                'message_tilte'=>'Succès',
                'message_content'=>'Il est éffectivement le bénéficiaire',
            ], 200);
        }

        return Response()->json([
            'status'=>'NON_OK',
            'message_tilte'=>'Erreur',
            'message_content'=>'les informations sont incorrectes',
        ]);
    }
}
