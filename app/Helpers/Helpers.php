<?php


use App\Enums\StatutDemandeEnum;

const DEFAULT_PASSWORD = 'password';
const DEFAULT_TEAM_ID = 1;

/**
 * Les statuts possibles pour une demande de livraison
 */
const DEMANDE_INITIEE    = 1;
const DEMANDE_ENCOURS    = 2;
const DEMANDE_EFFECTUEE  = 3;
const DEMANDE_ANNULEE    = 4;


function badgeColor(int $statutDemande)
{
    return match ($statutDemande) {
        DEMANDE_INITIEE => 'badge-primary',
        DEMANDE_ENCOURS => 'badge-warning',
        DEMANDE_EFFECTUEE => 'badge-success',
        DEMANDE_ANNULEE => 'badge-danger',
    };
}
