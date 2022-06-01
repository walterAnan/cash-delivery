<?php

namespace App\Http\Controllers;

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\Demande;
use App\Models\DemandeLivraison;
use App\Models\Livraison;
use App\Models\Livreur;
use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Collection;
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


// Fonction qui determine le nombre de livraisons initiée

    public static function nombre_nouvelle_demande(){
        $nombre_nouvelle_demande = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->count();
        return $nombre_nouvelle_demande;

    }

// Fonction le nombre total de livraisons

    public static function nombreT_nouvelle_demande(){
        $nombre_nouvelle_demande = DB::table('demande_livraisons')->count();
        return $nombre_nouvelle_demande;

    }

 // Fonction qui determine les 4 meilleurs livreurs en fonction des montants livrés

    public static function livreursPro(){
        $livraisonsPro = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->selectRaw('livreur_id, sum(montant_livraison)as montant_total')
            ->addSelect(['raison_sociale' => Livreur::select('raisonSociale')
                ->whereColumn('livreur_id', 'livreurs.id')
            ])->groupBy('livreur_id')
            ->orderBy('montant_total', 'DESC')->take(4)->get();
        return $livraisonsPro;
    }



    // Fonction qui définit le chiffre d'affaires total réalisé

    public static function chiffreAffaires(){
        $chiffre_affaires = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
           $montant = $demande->montant_livraison;
           $chiffre_affaires +=$montant;

        }


        return self::prixMill(strval($chiffre_affaires));

    }


// Fonction qui retourne la commission sur chaque demande
    public static function commission(){
        $commission = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $montant = $demande->frais_livraison;
            $commission +=$montant;

        }

        return self::prixMill(strval($commission));

    }

// Fonction qui renvoie le plus gros montant livré

    public static function montantMax(){
        $montant = array();
        $i = 0;
        $demandes = DemandeLivraison::withTrashed()->get();
        foreach ($demandes as $demande){
            $montant[$i] = $demande->montant_livraison;
            $i++;

        }
        $montant_max = max($montant);

        return self::prixMill($montant_max);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // Fonction pour imprimer la page des livraions

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



// Fonction qui la vue sur l'activité des différents livreurs

    public function activites(Request|null $request)
    {
        $livreurs = $this->data($request);

        return view('demandes.activite', compact('livreurs'));
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

        $demande_livraisons = DemandeLivraison::findOrFail($id);
        return view('demandes.edit', compact('demande_livraisons', ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

//
//    public function notification(){
//
//        $SERVER_API_KEY = 'AAAAgr7iOR8:APA91bHySgh0RH9uZzaY5DQHIQTYNNMUO8ppUVa_lR-OtNDRjQo_B0FMH1f27p__RrFWK3TGzeQGouU7iVYr-LXfmz1_pdpq3BZSgpgziIc06rfAG1a39R2MZZ-J0sxdC2f0alFBrdVi';
//
//        $fcmUrl = 'POST https://fcm.googleapis.com/v1/projects/myproject-b5ae1/messages:send';
////        $token1 = $token;
//        $token = 'c4LPkG0BQjKbPsyJ4R1ATM:APA91bHkXutuXJABVqHvik5LFp1LBsm8Lm4xM9N6Atv1XmchqcSIcvzleJrClBE4c1rCY_l51Nql3yEkjtG3gLxtu4zjjxhdLtll4mE4w-JGqooD2kKQVRlPGLF84Un5uh8BtASROxpN';
//
//        $notification = [
//
//                "title" => 'Cash delivery notification',
//
//                "body" => 'Vous avez une nouvelle assignation de livraison',
//
//                "sound"=> "default" // required for sound on ios
//
//            ];
//        $extraNotificationData = [
//            'message' => $notification, 'data'=>'dd'
//
//        ];
//        $fcmNotification = [
//            'to'=>$token,
//            'notification'=> $notification,
//            'data'=>$extraNotificationData
//        ];
//
//
//        $dataString = json_encode($fcmNotification);
//
//        $headers = [
//
//            'Authorization: key=' . $SERVER_API_KEY,
//
//            'Content-Type: application/json',
//
//        ];
//
//
//
//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
//
//        curl_setopt($ch, CURLOPT_POST, true);
//
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//
//        $response = curl_exec($ch);
//        dd($response);
//
//
//    }




// Fonction pour faire l'assignation
    public function update(Request $request, int $id)
    {

         $request->validate([
          'livreur_id' => 'required|exists:livreurs,id',
          'agent_id' => 'required|exists:agent_livreurs,id',
        ]);

        $livreurAgent = AgentLivreur::findOrFail($request->livreur_id);


        $demande_livraison = DemandeLivraison::findOrfail($id);
        $demande_livraison->livreur_id = $request->livreur_id;
        $demande_livraison->agent_livreur_id = $request->agent_id;
        $token = $livreurAgent->token;
        $this->notification();
        $demande_livraison->statut_demande_id = DEMANDE_ASSIGNEE;
        $demande_livraison->save();
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


    public function sendNotification()
    {
//        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();


        $SERVER_API_KEY = 'AAAAgr7iOR8:APA91bHySgh0RH9uZzaY5DQHIQTYNNMUO8ppUVa_lR-OtNDRjQo_B0FMH1f27p__RrFWK3TGzeQGouU7iVYr-LXfmz1_pdpq3BZSgpgziIc06rfAG1a39R2MZZ-J0sxdC2f0alFBrdVi';
        $token = '';
        $data = [
            "registration_ids" => $token,
            "notification" => [
                "title" => 'Cash Delivery',
                "body" => 'Vous avez une nouvelle livraison',
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }



    public function getLivraisonEnCoursLivreur(){
            global $montantLivreur;
        $livraisons = DemandeLivraison::where('statut_demande_id', DEMANDE_ENCOURS);
        foreach ($livraisons as $livraison){
            $montant = $livraison->montant_livraison;
            $livreur = $livraisons->livreur_id->livra;
        }
    }

//// cacul de
//    public function montantLivraisonEnCours(){
//        $tab = [1,2,3];
//        $col = collect($tab)->sum(function ($t){
//            return $t;
//        });
//    }


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




  // Fonction pour effectuer le séparateur des milliers

    public static function prixMill($prix)
    {
        $str="";
        $prix = strval($prix);
        $long =strlen($prix)-1;

        for($i = $long ; $i>=0; $i--)
        {
            $j=$long -$i;
            if( ($j%3 == 0) && $j!=0)
            { $str= " ".$str;   }
            $p= $prix[$i];

            $str = $p.$str;

        }
        return($str);

    }

// Fonction pour déterminer la commission sur une periode définie
    public function commissionLivreur($id, $date_bg, $date_end ){
        $livraisonEffectuees = DemandeLivraison::where('livreur_id', $id)->whereBetween('date_livraison', [$date_bg, $date_end])->where('statut_demande_id', DEMANDE_EFFECTUEE)->get();
        $livreur = Livreur::findOrFail($id);
        if($livreur->modeCommission == "TAUX"){
            $commission = 0.0;
            foreach($livraisonEffectuees as $livraisonEffectuee){
                $commission += ($livreur->valeurCommission/100) * $livraisonEffectuee->frais_livraison;
            }
            return self::prixMill($commission);
        }else{
            return self::prixMill($livreur->valeurCommission*($livraisonEffectuees->count()));
        }
    }

// Determine les frais des livraisons éffectuées pour un livreur
    public function fraisLivraisonEffectuees($id, $date_bg, $date_end){
        return self::prixMill(DemandeLivraison::query()
            ->where('livreur_id', $id)
            ->whereBetween('date_livraison', [$date_bg, $date_end])
            ->where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->sum('frais_livraison'));

    }



// Calcule le le montant totzl des livraisons éffectuées pour un livreur
    public function montantLivraisonEffectuees($id, $date_bg, $date_end){
        return self::prixMill(DemandeLivraison::query()
            ->where('livreur_id', $id)
            ->whereBetween('date_livraison', [$date_bg, $date_end])
            ->where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->sum('montant_livraison'));

    }

// Determine le nombre de livraisons éffectuées
    public function nombreLivraisonEffectuees($id, $date_bg, $date_end){
        return self::prixMill(DemandeLivraison::query()
            ->where('livreur_id', $id)
            ->whereBetween('date_livraison', [$date_bg, $date_end])
            ->where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->count());

    }



// Renvoie pour chaque livreur la commission, le nombre de livraisons éffectuées, les frais des livraions qu'il a éffectuées et le montant de ses livraisons

    public function data(Request $request){
        $dateDebut = $request->dateDebut;
        $dateFin = $request->dateFin;
        $livreurs = Livreur::query()
            ->with('livraisons:id,livreur_id')
            ->select(['id', 'raisonSociale'])
            ->get()
            ->map(function ($livreur) use ($dateDebut,$dateFin){
                $livreur->commission = $this->commissionLivreur($livreur->id, $dateDebut, $dateFin);
                $livreur->livraisonEffectuees = $this->nombreLivraisonEffectuees($livreur->id, $dateDebut, $dateFin);
                $livreur->fraisLivraisons = $this->fraisLivraisonEffectuees($livreur->id, $dateDebut, $dateFin);
                $livreur->montantLivrains = $this->montantLivraisonEffectuees($livreur->id, $dateDebut, $dateFin);
                return $livreur;
                });


        return view('demandes.activite', compact('livreurs'));

        }

}
