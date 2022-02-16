<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutAgenceSeeder extends Seeder
{
    private string $table = 'statut_agences';

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
            ],

            [
                'libelle' => 'Non Disponible',
                'slug' => 'non-disponible',
            ],
        ]);
    }
}
