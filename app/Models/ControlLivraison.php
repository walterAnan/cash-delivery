<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlLivraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'est_livreur_interne',
        'montant_min_livraison',
        'montant_max_livraison',
    ];

}
