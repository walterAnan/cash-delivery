<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandeLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_operation',
        'code_agence',
        'nom_client',
        'tel_client',
        'adresse_livraison',
        'nom_beneficiaire',
        'tel_beneficiaire',
        'montant_livraison',
        'billet_10000',
        'billet_5000',
        'frais_livraison',
        'commission',
        'voucher',
        'lien_gps',
        'date_reception',
        'heure_reception',
        'date_livraison',
        'heure_livraison',
        'livreur',
        'agent_livreur',
        'statut_livraison',
        'code_utilisateur'
    ];

    public function agence():BelongsTo
    {
        return $this->belongsTo(Agence::class);
    }



    public function utilisateur():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function liveur(): BelongsTo
    {
        return $this->belongsTo(Livreur::class);
    }

    public function agent_livreur(): BelongsTo
    {
        return $this->belongsTo(AgentLivreur::class);
    }
}
