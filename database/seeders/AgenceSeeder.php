<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenceSeeder extends Seeder
{
    public $table = 'agences';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'codeAgence' => 'AG_10000000',
                'nomAgence' => 'Agence Principale',
                'adresseAgence' => 'Boulevard triomphale',
                'statut_agence_id' => 1,
            ]
        ]);
    }
}
