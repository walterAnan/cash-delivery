<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControlLivraisonSeeder extends Seeder
{
    private $table = "control_livraisons";

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'est_livreur_interne' => true,
                'montant_min_livraison' => '200000',
                'montant_max_livraison' => '100000000',
            ],
            [
                'est_livreur_interne' => false,
                'montant_min_livraison' => '200000',
                'montant_max_livraison' => '5000000',
            ]
        ]);
    }
}
