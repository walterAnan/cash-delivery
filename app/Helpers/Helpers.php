<?php

enum StatutLivraison: string
{
    case INITIEE = 'initiee';
    case EN_COURS = 'en-cours';
    case EFFECTUEE = 'effectuee';
    case ANNULEE = 'annulee';
}


const DEFAULT_PASSWORD = 'password';

const DEFAULT_TEAM_ID = 1;
