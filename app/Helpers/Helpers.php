<?php


use App\Enums\StatutDemandeEnum;

const DEFAULT_PASSWORD = 'password';
const DEFAULT_TEAM_ID = 1;

function badgeColor(StatutDemandeEnum $statutDemande)
{
    return match ($statutDemande) {
        StatutDemandeEnum::INITIEE => 'badge-primary',
        StatutDemandeEnum::ENCOURS => 'badge-warning',
        StatutDemandeEnum::EFFECTUEE => 'badge-success',
        StatutDemandeEnum::ANNULEE => 'badge-danger',
    };
}
