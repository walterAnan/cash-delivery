<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'imei',
        'token',
        'statut',

    ];


    public function agentProprio(): BelongsTo
    {
        return $this->belongsTo(AgentLivreur::class);
    }
}
