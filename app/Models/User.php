<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email', 'password', 'agence_id', 'current_team_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Vérifie si l'utilisateur actuel est un administrateur
     *
     * @return bool
     */
    public function hasAdminRole(): bool
    {
        return $this->hasTeamRole(auth()->user()->currentTeam, 'admin');
    }

    /**
     * Vérifie si l'utilisateur actuel est un administrateur
     *
     * @return bool
     */
    public function hasEditorRole(): bool
    {
        return $this->hasTeamRole(auth()->user()->currentTeam, 'editor');
    }


    public function hasObserverRole(): bool
    {
        return $this->hasTeamRole(auth()->user()->currentTeam, 'observer');
    }



    public function agence(): BelongsTo
    {
        return $this->belongsTo(Agence::class);
    }

    public function demande_livraison(): HasMany
    {
        return $this->hasMany(DemandeLivraison::class);
    }
}
