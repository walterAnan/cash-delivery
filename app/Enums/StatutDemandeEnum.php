<?php

namespace App\Enums;

//enum StatutDemande: string
//{
//    case INITIEE = 'Initiée';
//    case ENCOURS = 'En cours';
//    case EFFECTUEE = 'Effectuée';
//    case ANNULEE = 'Annulée';
//}

enum StatutDemandeEnum: int
{
    case INITIEE = 1;
    case ENCOURS = 2;
    case EFFECTUEE = 3;
    case ANNULEE = 4;
}
