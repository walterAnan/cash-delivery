<?php

namespace App\Http\Livewire;

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\ControlLivraison;
use App\Models\DemandeLivraison;
use App\Models\Livreur;
use App\Models\Localite;
use FontLib\Table\Type\loca;
use Livewire\Component;

class LivreurAgents extends Component
{
    public $livreurs;
    public $localites;
    public $agents;
//    public $agentsParLivreurEtLocalite;

    public $selectedLivreur = null;
    public $selectedLocalite = null;
    public $selectedAgent = null;
    public $livraisonEnCours;


    public function mount($idLivraisonEnCours)
    {
        $this->livraisonEnCours = DemandeLivraison::query()->findOrFail($idLivraisonEnCours);

        $this->selectedLocalite = Localite::whereVille($this->livraisonEnCours->adresse_livraison)->first()?->id;

        $montantLivraisonEnCours = DemandeLivraison::findOrFail($idLivraisonEnCours)->montant_livraison;
        $controlLivreurExterne = ControlLivraison::where('est_livreur_interne', false)->firstOrFail();


        if($montantLivraisonEnCours > $controlLivreurExterne->montant_max_livraison){
            $this->livreurs = Livreur::query()
                ->whereRelation('controlLivraison', 'est_livreur_interne', true)
                ->get();
        } else {
            $this->livreurs = Livreur::all()->filter(function ($livreur) use ($idLivraisonEnCours) {
                return $this->estElligible($livreur->id, $idLivraisonEnCours);
            });
        }

        $this->localites = Localite::all();

//        $this->agentsParLiveur = collect();

        $this->agents = AgentLivreur::all();

    }

    public function updatedSelectedLivreur(int $livreur_id)
    {
        $livreur= Livreur::findOrFail($livreur_id);
        $this->agents = $livreur->agentLivreurs
            ->filter(function ($agent) {
                return $agent->localite?->id == $this->selectedLocalite;
            })
            ->filter(function ($agent) {
                return $agent->estDisponible;
            })
        ;
        //dd($this->agentsParLivreur->toArray());
    }

    public function updatedSelectedLocalite(int $localite_id)
    {
        $localite = Localite::findOrFail($localite_id);
        $agents_tmp = $this->agents;
        $this->agents = AgentLivreur::query()
            ->when($this->selectedLivreur, function ($query) {
                $query->where('livreur_id', $this->selectedLivreur);
            })
            ->where('localite_id', $localite_id)->where('estDisponible', '=', true)
            ->get();
    }


    public function sommeLivraisons($idLivreur){
        $montantTotalLivraison = 0;
        $livraisons = DemandeLivraison::where('livreur_id', $idLivreur)->where('statut_demande_id', DEMANDE_ENCOURS)->get();
        foreach ($livraisons as $livraison){
            $montantTotalLivraison += $livraison->montant_livraison;
        }
        return $montantTotalLivraison;
    }

    public function caution($idLivreur){
        $livreur = Livreur::findOrFail($idLivreur);
        $caution = $livreur->cautionLivreur;
        return $caution;
    }
    public function montantDemandeEnCours($idDemandeEnCours){
        $livraison = DemandeLivraison::findOrFail($idDemandeEnCours);
        return $livraison->montant_livraison;
    }

    public function estElligible($idLivreur, $idLivraisonEnCours): bool
    {
        $caution = $this->caution($idLivreur);
        $montantTotalLivraisons = $this->sommeLivraisons($idLivreur) + $this->montantDemandeEnCours($idLivraisonEnCours);
        return $caution >= $montantTotalLivraisons;
    }




    public function render()
    {

        return view('livewire.livreur-agents');
    }
}
