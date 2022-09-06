<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotifSeeder extends Seeder
{
    public $table = 'motif_suppressions';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [

                'libelle' => 'autre',

            ],
            [
                'libelle'=>'demande du client'
            ]
        ]);
    }
}
