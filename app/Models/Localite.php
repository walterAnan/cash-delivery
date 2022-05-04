<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Localite extends Model
{
    use HasFactory;
    protected $fillable = [
        'ville',

    ];

    public function agents():HasMany
    {
        return $this->hasMany(AgentLivreur::class);
    }
}
