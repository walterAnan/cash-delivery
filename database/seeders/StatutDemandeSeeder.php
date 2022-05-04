<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutDemandeSeeder extends Seeder
{
    protected $table = 'statut_demandes';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
           [
               'libelle' => 'Initiée',
               'slug'=>'initiee',
               'description' => 'Livraison initiée',
           ],

            [
                'libelle' => 'Assignée',
                'slug'=>'assignee',
                'description' => 'Livraison assignée',
            ],
            [
                'libelle' => 'En cours',
                'slug' => 'en-cours',
                'description' => 'Livraison en cours',
            ],
            [
                'libelle' => 'Effectuée',
                'slug' => 'effectuee',
                'description' => 'Livraison effectuée',
            ],
            [
                'libelle' => 'Annulée',
                'slug' => 'annulee',
                'description' => 'Livraison annulée',
            ]

        ]);
    }
}
