<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutAgentLivreurSeeder extends Seeder
{
    private string $table = 'statut_agent_livreurs';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'libelle' => 'Disponible',
                'slug' => 'disponible',
                'description'=>'Agent Livreur dispo'
            ],

            [
                'libelle' => 'Non Disponible',
                'slug' => 'non-disponible',
                'description'=>'Agent Livreur non dispo'
            ],
        ]);
    }
}
