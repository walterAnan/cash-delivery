<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocaliteSeeder extends Seeder
{
    private string $table = 'localites';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'ville' => 'Libreville',
            ],


            [
                'ville' => 'Libreville-Akanda',
            ],

            [
                'ville' => 'Libreville-Owendo',
            ],

            [
                'ville' => 'Libreville-Pk',
            ],

           ]);
        //
    }
}
