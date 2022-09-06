<?php

namespace App\Models;

use App\Enums\StatutDemandeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DemandeLivraison extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'demande_livraisons';

    protected $fillable = [
        'ref_operation',
        'code_agence',
        'nom_client',
        'tel_client',
        'adresse_livraison',
        'nom_beneficiaire',
        'tel_beneficiaire',
        'montant_livraison',
        'nombreBillet10000',
        'nombreBillet5000',
        'frais_livraison',
        'voucher',
        'lien_gps',
        'date_reception',
        'date_livraison',
        'livreur',
        'agent_livreur',
        'statut_demande_id',
        'motif_suppression_id',
        'user_id'
    ];

    protected $casts = [
        'date_reception' => 'datetime',
        'date_livraison' => 'datetime',
    ];


    public function agence():BelongsTo
    {
        return $this->belongsTo(Agence::class);
    }

    public function user():BelongsTo
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

    public function statutDemande(): BelongsTo
    {
        return $this->belongsTo(StatutDemande::class);
    }

    public function motif(): belongsTo
    {
        return $this->belongsTo(StatutDemande::class);
    }
}
