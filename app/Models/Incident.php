<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeIncident',
        'descriptionIncident',
        'demande_livraison_id',
    ];

    public function demande_livraison():BelongsTo
    {
        return $this->belongsTo(DemandeLivraison::class);
    }
}
