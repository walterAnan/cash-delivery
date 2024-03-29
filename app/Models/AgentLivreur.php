<?php

namespace App\Models;

use App\Enums\StatutAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AgentLivreur extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeAgent',
        'nomAgent',
        'prenomAgent',
        'telephoneAgent',
        'adresseAgent',
        'estDisponible',
        'soldeNetAgent',
        'localite_id',
        'livreur_id',
        'moyensdedeplacement_id',
    ];

    public static function findOrFail($id)
    {
    }

    public function localite(): BelongsTo
    {
        return $this->belongsTo(Localite::class);
    }

    public function livreur():BelongsTo
    {
        return $this->belongsTo(Livreur::class, 'livreur_id', 'id');
    }

    public function livraisons(): HasMany
    {
        return $this->hasMany(DemandeLivraison::class);
    }

    public function controlLivraison():HasOne
    {
        return $this->hasOne(ControlLivraison::class);
    }

    public function moyenDeDeplacement():HasMany
    {
        return $this->hasMany(MoyensDeDeplacement::class);
    }
    public function device():HasMany
    {
        return $this->hasMany(Device::class);
    }

    protected $casts = [
        'estDisponible'=> 'boolean',
    ];

    protected $appends = [
        'disponibilite'
    ];

    public function getDisponibiliteAttribute(): string
    {
        if ($this->getAttribute('estDisponible')) {
            return 'Disponible';
        } else {
            return 'Indisponible';
        }
    }
}
