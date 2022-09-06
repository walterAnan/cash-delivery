<?php

namespace App\Http\Livewire;

use App\Http\Controllers\DemandeController;
use App\Models\AgentLivreur;
use App\Models\DemandeLivraison;
use App\Models\MotifSuppression;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Motif extends Component
{
    public $demande;
    public $libelle;
    public $libelle_autre;
    public function mount(DemandeLivraison $demande_livraison)
    {
        $this->demande = $demande_livraison;
    }

    protected $rules = [
        'libelle' => 'required',
        'libelle_autre' => ['max:191', 'required_if:libelle,1']

    ];

    public function getMotifsProperty()
    {
        return MotifSuppression::all();
    }


    public function saveMotif()
    {
//        dd($this->demande);
        $this->validate();

        $this->demande->motif_suppression_id = $this->libelle;
        $this->demande->desc_motif_annulation = $this->libelle_autre;
        $this->demande->statut_demande_id = DEMANDE_ANNULEE;
        $numero_clt = $this->demande->tel_client;
        $numero_clt = "+241".substr($numero_clt,-8);
        $nom_clt = $this->demande->nom_beneficiaire;
//        $montant = $demande->montant_livraison;
        $date =Carbon::createFromFormat('Y-m-d H:i:s', $this->demande->date_reception)->format('Y-m-d');

        $ref = $this->demande->ref_operation;
        $montant = DemandeController::prixMill($this->demande->montant_livraison);
        $frais = DemandeController::prixMill($this->demande->frais_livraison);

        $messageContent = "Votre transaction Cash Delivery de reférence $ref du $date d'un montant de $montant XAF  a été annulée, votre compte sera juste débité des frais de transaction d'un montant de $frais XAF";
        DemandeController::SendMessage($numero_clt, $messageContent);
        if($this->demande->status == DEMANDE_ENCOURS || $this->demande->status == DEMANDE_ASSIGNEE){
            $agent = AgentLivreur::findOrFail($this->demande->agent_id);
            $num_agent = $agent->telephoneAgent;
            $num_agent = "+241".substr($num_agent,-8);
            $messageContentAgent = "Nous vous informons que la demande cash delivery de référence $ref du client $nom_clt est annulée ";
            DemandeController::SendMessage($num_agent, $messageContentAgent);
        }
        else{
            print('la demande est donc initiée');
        }

        DB::transaction(function() {
            $this->demande->save();
            $this->reset();
            return redirect()->route('data_sav');
        });

    }

    public function render()
    {
        return view('livewire.motif');
    }
}
