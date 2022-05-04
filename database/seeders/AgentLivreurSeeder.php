<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentLivreurSeeder extends Seeder
{
    public $table = 'agent_livreurs';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            [
                'codeAgent' => '100100100',
                'nomAgent' => 'Agent1',
                'prenomAgent' => 'PrenomAgent1',
                'telephoneAgent' => '062380452',
                'adresseAgent' =>'IAI' ,
                'soldeNetAgent' => 1000000,
                'agence_id' => 1,
                'livreur_id'=>1,
                'estDisponible'=>false
            ],

            [
                'codeAgent' => '200200200',
                'nomAgent' => 'Agent2',
                'prenomAgent' => 'PrenomAgent2',
                'telephoneAgent' => '065988685',
                'adresseAgent' =>'IAI' ,
                'soldeNetAgent' => 1000000,
                'agence_id' => 1,
                'livreur_id'=>2,
                'estDisponible'=>false
            ]
        ]);
    }
}
