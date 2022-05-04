<?php

namespace App\Http\Controllers;

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\Demande;
use App\Models\DemandeLivraison;
use App\Models\Livraison;
use App\Models\Livreur;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use phpDocumentor\Reflection\Types\Static_;
use Ramsey\Uuid\Type\Integer;
use StatutLivraison;
use PDF;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()

    {
        $demande_livraisons = DemandeLivraison::orderBy('updated_at', 'desc')->get();
        $chart_options = [
            'chart_title' => 'Répartition des demandes en fonction de leur statut',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\DemandeLivraison',
            'conditions'            => [
                ['name' => 'INITIEE', 'condition' => 'statut_demande_id = 1', 'color' => 'black', 'fill' => true],
                ['name' => 'ASSIGNEE', 'condition' => 'statut_demande_id = 2', 'color' => 'blue', 'fill' => true],
                ['name' => 'EN COURS', 'condition' => 'statut_demande_id = 3', 'color' => 'blue', 'fill' => true],
                ['name' => 'EFFECTUEE', 'condition' => 'statut_demande_id = 4', 'color' => 'blue', 'fill' => true],
                ['name' => 'ANNULEE', 'condition' => 'statut_demande_id = 5', 'color' => 'blue', 'fill' => true],
            ],
            'group_by_field' => 'statut_demande_id',
            'aggregate_function' => 'count',
//                'group_by_period' => 'day',
            'chart_type' => 'pie',
            'chart_color'=>'60, 179, 113'
        ];
        $chart1 = new LaravelChart($chart_options);


        return view('demandes.index', compact('demande_livraisons', 'chart1'));
    }


//
//    public  function dashboard(){
//        return view('dashboard');
//    }

    public static function nombre_nouvelle_demande(){
        $nombre_nouvelle_demande = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->count();
        return $nombre_nouvelle_demande;

    }


    public static function nombreT_nouvelle_demande(){
        $nombre_nouvelle_demande = DB::table('demande_livraisons')->count();
        return $nombre_nouvelle_demande;

    }

    public static function meilleurLivreurs(){
        $livraionPro = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->select("livreur_id",
                DB::raw("(sum(montant_livraison)) as montant_total"),

            )
            ->groupBy(DB::raw("demande_livraisons.livreur_id"))
            ->orderBy('montant_total', 'DESC')->take(4)->get();
       return $livraionPro;

    }


    public static function livreursPro(){
        $livraisonsPro = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->selectRaw('livreur_id, sum(montant_livraison)as montant_total')
            ->addSelect(['raison_sociale' => Livreur::select('raisonSociale')
                ->whereColumn('livreur_id', 'livreurs.id')
            ])->groupBy('livreur_id')
            ->orderBy('montant_total', 'DESC')->take(4)->get();
        return $livraisonsPro;
    }

    public static function chiffreAffaires(){
        $chiffre_affaires = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
           $montant = $demande->montant_livraison;
           $chiffre_affaires +=$montant;

        }

        return $chiffre_affaires;

    }



    public static function commission(){
        $commission = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $montant = $demande->commission;
            $commission +=$montant;

        }

        return $commission;

    }


    public static function montantMax(){
        $montant = [];
        $i = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $i++;
            $montant = [$demande->montant_livraison];

        }
        $montant_max = max($montant);
        return $montant_max;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demande_livraisons = DemandeLivraison::all();
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'demande_livraisons'=>$demande_livraisons
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('dash.pdf');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(int $id)
    {

        $demande_livraisons = DemandeLivraison::whereId($id)->first();



        return view('demandes.show', compact('demande_livraisons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     */
    public function edit($id)
    {
//        $id_demandes = [];

        $demande_livraisons = DemandeLivraison::findOrFail($id);
//        dd($demande_livraisons);
//        $id_demandes[] = DemandeLivraison::all()->map->only(['id']);
        return view('demandes.edit', compact('demande_livraisons', ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function notification($token){
        $SERVER_API_KEY = 'AAAAgr7iOR8:APA91bE_QmF1co-htcVgK6HwrgYRUp6a5JBNkA-YV4ArCIVairMPDDbGcvwuAI_colGobLj-mB6GW92l8KbC4ijFn9KhmUvfiWmlggSMRj5yKKyVLGCLnXlvW-mG_ktXaSFfQvsxc6Ho';
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token1 = $token;
//        $token = 'c4LPkG0BQjKbPsyJ4R1ATM:APA91bHkXutuXJABVqHvik5LFp1LBsm8Lm4xM9N6Atv1XmchqcSIcvzleJrClBE4c1rCY_l51Nql3yEkjtG3gLxtu4zjjxhdLtll4mE4w-JGqooD2kKQVRlPGLF84Un5uh8BtASROxpN';
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
    public function update(Request $request, int $id)
    {

         $request->validate([
          'livreur_id' => 'required|exists:livreurs,id',
          'agent_id' => 'required|exists:agent_livreurs,id',
        ]);

        $agence = Livreur::findOrFail($request->livreur_id)->agence;
//        $agent = AgentLivreur::findOrFail($request->agent_id)->nomAgent;

//        dd($demande);

        $demande_livraison = DemandeLivraison::findOrfail($id);
        $demande_livraison->livreur_id = $request->livreur_id;
        $demande_livraison->agent_livreur_id = $request->agent_id;
        $token = $demande_livraison->token;
        //$demande_livraison->commission = $demande_livraison->frais_livraison*0.4;

//        $livraison->user_id = 2;
        $demande_livraison->statut_demande_id = DEMANDE_ASSIGNEE;
        $demande_livraison->save();
        $this->notification($token);
        return redirect()->route('demandes.index')->with('success','Livraison Assignée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        DemandeLivraison::whereId($id)->delete();

        return redirect()->route('demandes.index');
    }


    public function getLivraisonEnCoursLivreur(){
            global $montantLivreur;
        $livraisons = DemandeLivraison::where('statut_demande_id', DEMANDE_ENCOURS);
        foreach ($livraisons as $livraison){
            $montant = $livraison->montant_livraison;
            $livreur = $livraisons->livreur_id->livra;
        }
    }


    public function montantLivraisonEnCours(){
        $tab = [1,2,3];
        $col = collect($tab)->sum(function ($t){
            return $t;
        });
        dd($this->montantLivraisonEnCours());
    }


    public function  recherche(){
        $recherche = $_GET['recherche'];
        $demandes = DemandeLivraison::where('ref_opreration', 'like', '%'.$recherche.'%')->get();
        return view('demandes.recherche', compact('demandes'));
    }



    public Static function chart1()
    {

        $record = DemandeLivraison::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();

        $data = [];

        foreach($record as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $data['chart_data'] = json_encode($data);
        return $data;
    }


}
