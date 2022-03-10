<?php

namespace App\Enums;

enum StatutDemande: string
{
    case INITIEE = 'Initiée';
    case ENCOURS = 'En cours';
    case EFFECTUEE = 'Effectuée';
    case ANNULEE = 'Annulée';
}
