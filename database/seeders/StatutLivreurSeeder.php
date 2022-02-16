<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatutLivreurSeeder extends Seeder
{
    private string $table = 'statut_livreurs';
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
                'description'=>'Livreur dispo'
            ],

            [
                'libelle' => 'Non Disponible',
                'slug' => 'non-disponible',
                'description'=>'Livreur non dispo'
            ],
        ]);
    }
}
