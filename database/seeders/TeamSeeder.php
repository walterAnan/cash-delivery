<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    private $table = 'teams';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'user_id' => 1,
                'name' => 'Ventis',
                'personal_team' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
