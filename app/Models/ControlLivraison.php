<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlLivraison extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeContrôl',
        'libelleContrôl'
    ];

    public function controle(){
        //
    }
}
