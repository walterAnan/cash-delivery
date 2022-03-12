<?php

namespace Database\Seeders;

use App\Models\Demande;
use App\Models\Livreur;
use Database\Seeders\App\AgentLivreur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call(StatutAgenceSeeder::class);
        $this->call(AgenceSeeder::class);
        $this->call(LivreurSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(StatutLivreurSeeder::class);
        Demande::factory(10)->create();
        $this->call(StatutDemandeSeeder::class);
        $this->call(DemandeLivraisonSeeder::class);

    }
}
