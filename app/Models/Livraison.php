<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_livreur_id',
        'demande_id',
        'codeLivraison',
        'dateLivraison',
        'statutlivraison',
    ];

    protected $casts = [
        'dateLivraison'=> 'datetime',
    ];


    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }


    public function agentLivreur(): BelongsTo
    {
        return $this->belongsTo(AgentLivreur::class);
    }
}
