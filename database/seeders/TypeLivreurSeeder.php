<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TypeLivreurSeeder extends Seeder
{
    private $table = 'type_livreurs';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'libelle' => 'Interne',
                'slug'=>'interne',
                'description' => 'livreur interne',
            ],

            [
                'libelle' => 'Externe',
                'slug'=>'externe',
                'description' => 'livreur externe',
            ],

        ]);
    }
}
