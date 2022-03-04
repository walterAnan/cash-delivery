<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeLivraison extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'demande_livraisons';

    protected $fillable = [
        'ref_operation',
        'code_agence',
        'nom_client',
        'prenom_client',
        'tel_client',
        'adresse_livraison',
        'nom_beneficiaire',
        'prenom_beneficiaire',
        'tel_beneficiaire',
        'montant_livraison',
        'nombreBillet10000',
        'nombreBillet5000',
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
        'user_id'
    ];

    public function agence():BelongsTo
    {
        return $this->belongsTo(Agence::class);
    }



    public function utilisateur():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function livreur(): BelongsTo
    {
        return $this->belongsTo(Livreur::class);
    }

    public function agent_livreur(): BelongsTo
    {
        return $this->belongsTo(AgentLivreur::class);
    }
}
