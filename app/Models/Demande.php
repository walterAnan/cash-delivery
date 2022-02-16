<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'montantDemande',
        'fraisDemande',
        'nombreBillet10000',
        'nombreBillet5000',
        'client_id',
        'statut',
    ];


    protected $casts = [
      'estAssigne'=>'boolean'
    ];


    // Retourne les infos du client ayant initié la demande
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }


    //retourne la livraison de la demande
    public function livraison(): HasOne
    {
        return $this->hasOne(Livraison::class);
    }


}
