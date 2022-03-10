<?php


use App\Enums\StatutDemande;

const DEFAULT_PASSWORD = 'password';
const DEFAULT_TEAM_ID = 1;

function badgeColor(StatutDemande $statutDemande)
{
    return match ($statutDemande) {
        StatutDemande::INITIEE => 'badge-primary',
        StatutDemande::ENCOURS => 'badge-warning',
        StatutDemande::EFFECTUEE => 'badge-success',
        StatutDemande::ANNULEE => 'badge-danger',
    };
}
