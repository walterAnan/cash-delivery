<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livreur extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeLivreur' ,
        'nomResponsable',
        'prenomResponsable',
        'raisonSociale',
        'telephoneResponsable',
        'adresseLivreur',
        'emailLivreur',
        'cautionLivreur',
        'telephoneLivreur',
        'agence_id'
    ];


//    public function livraisons(): HasMany
//    {
//        return $this->hasMany(Livraison::class, 'livraison_id', 'id');
//
//    }


    public function livreurs(): HasMany
    {
        return $this->hasMany(Livreur::class);

    }

    public function agentLivreurs(): HasMany
    {
        return $this->hasMany(AgentLivreur::class);

    }


    public function agence(): BelongsTo
    {
        return $this->belongsTo(Agence::class);

    }
}
