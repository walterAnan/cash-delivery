<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeAgence',
        'nomAgence',
        'adresseAgence',
        'statut_agence_id',
    ];

    public function demande_livraisons():HasMany
    {
        return $this->hasMany(DemandeLivraison::class);
    }

    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }

    public function statut(): BelongsTo
    {
        return $this->belongsTo(StatutAgence::class, 'statut_agence_id', 'id');
    }

    public function getStatutColorAttribute(): string
    {
        return ($this->statut->slug == 'disponible')
            ? 'success'
            : 'dark';
    }

    public function livreurs(): HasMany
    {
        return $this->hasMany(Livreur::class);
    }




}
