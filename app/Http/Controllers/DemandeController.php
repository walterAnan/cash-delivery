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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use phpDocumentor\Reflection\Types\Static_;
use PHPUnit\Util\Exception;
use Ramsey\Uuid\Type\Integer;
use StatutLivraison;
use PDF;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;


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


    public static function demandesEncours(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_ENCOURS)->whereDate('updated_at', Carbon::today())->get();
        return $demandes;

    }


    public static function demandesAssigne(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_ASSIGNEE)->whereDate('updated_at', Carbon::today())->get();
        return $demandes;

    }



    public static function demandesAnnuler(){
        $demande_livraisons = DemandeLivraison::with('statutDemande:id,libelle')->where('statut_demande_id', DEMANDE_ANNULEE)->withTrashed()->get();
//        dd($demande_livraisons->toArray());
        return view('demandes.annule', compact('demande_livraisons'));

    }

// Fonction qui determine le nombre de livraisons initiée

    public static function nombre_nouvelle_demande(){
        $chiffre_affaires = 0;
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->where('created_at', now())->get();
        foreach ($demandes as $demande){
            $montant = $demande->montant_livraison;
            $chiffre_affaires +=$montant;



        }


        return self::prixMill(strval($chiffre_affaires));

    }



    public function demandesSav(){
       $demande_livraisons = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->get();

        return view('demandes.sav', compact('demande_livraisons'));

    }


    public function savDonnee(){
        $demande_livraisons = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->get();
        if (request('term')) {
            $demande_livraisons->where('ref_operation', 'Like', '%' . request('term') . '%');
        }

        return view('demandes.sav_donnee', compact('demande_livraisons'));


    }

// Fonction le nombre total de livraisons

    public static function nombreT_nouvelle_demande(){
        $nombre_nouvelle_demande = DB::table('demande_livraisons')->count();
        return $nombre_nouvelle_demande;

    }

 // Fonction qui determine les 4 meilleurs livreurs en fonction des montants livrés

    public static function livreursPro(){
        $livraisonsPro = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereMonth('created_at', Carbon::now()->month)
            ->selectRaw('livreur_id, sum(montant_livraison) as montant_total, COUNT(id) as nombre')
            ->addSelect(['raison_sociale' => Livreur::select('raisonSociale')
                ->whereColumn('livreur_id', 'livreurs.id')
            ])->groupBy('livreur_id')
            ->orderBy('montant_total', 'DESC')->take(4)->get();
        return $livraisonsPro;
    }



    public static function sendMessage(String $receiver, String $messageContent){
        $receiverNumber = $receiver;
        $message = $messageContent;

        try {
            $account_sid = config('app.twilio_sid');
            $auth_token = config('app.twilio_token');

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => "sfe-fid",
                'body' => $message]);

        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }

    }



    public static function livreursProNombre(){
        $livraisonsPro = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)
            ->selectRaw('livreur_id')
            ->addSelect(['raison_sociale' => Livreur::select('raisonSociale')
                ->whereColumn('livreur_id', 'livreurs.id')
            ])->groupBy('livreur_id')->count();
        return $livraisonsPro;
    }



    // Fonction qui définit le chiffre d'affaires total réalisé

    public static function montantEncours(){
        $chiffre_affaires = 0;
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_ENCOURS)->where('created_at', now())->get();
        foreach ($demandes as $demande){
           $montant = $demande->montant_livraison;
           $chiffre_affaires +=$montant;

        }


        return self::prixMill(strval($chiffre_affaires));

    }





// Fonction qui retourne la commission sur chaque demande
    public static function montantEffectue(){
        $commission = 0;
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->where('created_at', now())->get();
        foreach ($demandes as $demande){
            $montant = $demande->montant_livraison;
            $commission +=$montant;

        }

        return self::prixMill(strval($commission));

    }


    public static function montantEffectueMois(){
        $commission = 0;
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereMonth('created_at', Carbon::now()->month)->get();
        foreach ($demandes as $demande){
            $montant = $demande->montant_livraison;
            $commission +=$montant;

        }

        return self::prixMill(strval($commission));

    }

    public static function demandeInitiee(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_INITIEE)->whereDate('created_at', Carbon::today())->get()->count();
        return $demandes;
    }


    public static function demandeEncours(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_ENCOURS)->whereDate('created_at', Carbon::today())->get()->count();
        return $demandes;
    }


    public static function demandeEffectue(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereDate('created_at', Carbon::today())->get()->count();
        return $demandes;
    }

    public static function demandeEffectueMois(){
        $demandes = DemandeLivraison::where('statut_demande_id', DEMANDE_EFFECTUEE)->whereDate('created_at', Carbon::today())->get()->count();
        return $demandes;
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

    public function activites_agents(Request|null $request)
    {
        $agents = $this->data_agents($request);


        return view('demandes.activite_agents', compact('agents'));
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





// Fonction pour faire l'assignation
    public function update(Request $request, int $id)
    {

        $request->validate([
            'livreur_id' => 'required|exists:livreurs,id',
            'agent_id' => 'required|exists:agent_livreurs,id',
        ]);

        $livreurAgent = AgentLivreur::findOrFail($request->agent_id);
        $demande_livraison = DemandeLivraison::findOrfail($id);
        $demande_livraison->livreur_id = $request->livreur_id;
        $demande_livraison->agent_livreur_id = $request->agent_id;
        $token = $livreurAgent->token;
        $numero_agt = $livreurAgent->telephoneAgent;
        $numero_agt = "+241".substr($numero_agt, -8);
        $message = "Vous avez une nouvelle livraison cash delivery à éffectuer";
        $this->sendMessage($numero_agt, $message);
        $demande_livraison->statut_demande_id = DEMANDE_ASSIGNEE;
        $assignueur = Auth::user();
        $demande_livraison->user_id = $assignueur->id;
        $demande_livraison->save();
        return redirect()->route('demandes.index')->with('success','Livraison Assignée avec succès!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */


    //Annulation de la demande
    public function destroy($id)
    {


        $demande = DemandeLivraison::whereId($id)->first();

        $numero_clt = $demande->tel_client;
        $numero_clt = "+241".substr($numero_clt,-8);;
        $date = $demande->date_reception;
        $ref = $demande->ref_operation;
        $messageContent = "Nous vous informons que votre demande cash delivery numero $ref du $date a été annulée avec succès";

        $demande->delete();

        return redirect()->route('demandes.index');
    }

    public function annule($id)
    {


        $demande = DemandeLivraison::whereId($id)->first();

        $numero_clt = $demande->tel_client;
        $numero_clt = "+241".substr($numero_clt,-8);
        $nom_client = $demande->nom_client;
        $date = $demande->date_reception;
        $ref = $demande->ref_operation;
        $messageContent = "Nous vous informons que votre demande cash delivery numero $ref du $date a été annulée avec succès";

        $demande->statut_demande_id = DEMANDE_ANNULEE;
       DemandeController::SendMessage($numero_clt, $messageContent);
       if($demande->status == DEMANDE_ENCOURS || $demande->status == DEMANDE_ASSIGNEE){
           $agent = AgentLivreur::findOrFail($demande->agent_id);
           $num_agent = $agent->telephoneAgent;
           $num_agent = "+241".substr($num_agent,-8);
           $messageContentAgent = "Nous vous informons que la demande cash delivery de référence $ref du client $nom_client est annulée ";
           DemandeController::SendMessage($num_agent, $messageContentAgent);
       }
       else{
           print('la demande est donc initiée');
       }
        return redirect()->route('demandes.annule');
    }


    public function sendNotification()
    {
//        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();


        $SERVER_API_KEY = 'BGh7IPpKiueL9Kk1TRGyhSeKQl_xKkUX0dgENVZ0tcboOZsCyj3GVaN9yQ5eaAagKsrf3sbvDZCLZXytcm0VZIQ';
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


    public function commissionAgent($id, $date_bg, $date_end ){
        $livraisonEffectuees = DemandeLivraison::where('agent_livreur_id', $id)->whereBetween('date_livraison', [$date_bg, $date_end])->where('statut_demande_id', DEMANDE_EFFECTUEE)->get();
        $livreurAgent = AgentLivreur::findOrFail($id);
        $livreur_id = $livreurAgent->livreur_id;


        $livreur = Livreur::findOrFail($livreur_id);
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


    public function data_agents(Request $request){
        $dateDebut = $request->dateDebut;
        $dateFin = $request->dateFin;
        $agents = AgentLivreur::query()
            ->select(['id', 'nomAgent'])
            ->get()
            ->map(function ($agent) use ($dateDebut,$dateFin){
                $agent->commission = $this->commissionAgent($agent->id, $dateDebut, $dateFin);
                $agent->livraisonEffectuees = $this->nombreLivraisonEffectuees($agent->id, $dateDebut, $dateFin);
                $agent->fraisLivraisons = $this->fraisLivraisonEffectuees($agent->id, $dateDebut, $dateFin);
                $agent->montantLivrains = $this->montantLivraisonEffectuees($agent->id, $dateDebut, $dateFin);
                return $agent;
            });

        return view('demandes.activite_agents', compact('agents'));

    }

}
