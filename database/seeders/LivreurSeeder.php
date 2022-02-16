<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LivreurSeeder extends Seeder
{
    public $table = 'livreurs';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'codeLivreur' => 'LIV_' . Str::random(8),
                'nomResponsable' => 'MBA NZUE',
                'prenomResponsable' => 'Kevin',
                'raisonSociale' => 'VENTIS',
                'telephoneResponsable' => '123456789',
                'adresseLivreur' => 'Batterie IV',
                'emailLivreur' => 'kevin@gmail.com',
                'cautionLivreur' => '5000000',
                'telephoneLivreur' => '123456789',
                'agence_id' => 1,
            ],

            [
                'codeLivreur' => 'LIV_' . Str::random(8),
                'nomResponsable' => 'KAMANA',
                'prenomResponsable' => 'Benjamin',
                'raisonSociale' => 'AFA TECHNOLOGY',
                'telephoneResponsable' => '321654987',
                'adresseLivreur' => 'Batterie IV',
                'emailLivreur' => 'benjamin@gmail.com',
                'cautionLivreur' => '2500000',
                'telephoneLivreur' => '321654987',
                'agence_id' => 1,
            ]
        ]);
    }
}
