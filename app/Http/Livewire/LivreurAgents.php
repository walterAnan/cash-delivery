<?php

namespace App\Http\Livewire;

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\DemandeLivraison;
use App\Models\Livreur;
use Livewire\Component;

class LivreurAgents extends Component
{
    public $livreurs;
    public $agents;

    public $selectedLivreur = null;
    public $selectedAgent = null;


    public function mount($idLivraisonEnCours)
    {

        $this->livreurs = Livreur::all()->filter(function ($livreur) use ($idLivraisonEnCours) {
            return $this->estElligible($livreur->id, $idLivraisonEnCours);
        });

        $this->agents = collect();
    }

    public function updatedSelectedLivreur(int $livreur_id)
    {

        $livreur= Livreur::findOrFail($livreur_id);
        $this->agents = $livreur->agentLivreurs;
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
//        dd($this->livreurs);
        return view('livewire.livreur-agents');
    }
}
