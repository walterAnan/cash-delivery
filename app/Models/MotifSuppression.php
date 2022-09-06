<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotifSuppression extends Model
{
    use HasFactory;
    protected $table = 'motif_suppressions';

    protected $fillable = [
        'libelle'=>'required',

    ];


    public function demandes(): hasMany
    {
        return $this->hasMany(DemandeLivraison::class);
    }


}
