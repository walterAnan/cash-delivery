<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemanadeLivraisonSeeder extends Seeder
{
    public $table = 'demande_livraisons';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table($this->table)->insert([
            [
                'ref_operation' =>'Ref1',
                'code_agence'=>'AG_000001',
                'nom_client'=>'Benj',
                'prenom_client'=>'Benj1',
                'tel_client'=>'IAI',
                'adresse_livraison'=>'IAI',
                'nom_beneficiaire'=>'Khalde',
                'prenom_beneficiaire'=>'Khalde1',
                'tel_beneficiaire'=>'012263',
                'montant_livraison'=>50000,
                'nombreBillet10000'=>3,
                'nombreBillet5000'=>4,
                'frais_livraison'=>5000,
                'voucher'=>'2100245603',
                'commission'=>'2000',
                'lien_gps'=>'https://google_maps',
                'date_reception'=>now(),
                'heure_reception'=>now(),
                'date_livraison'=>now(),
                'heure_livraison'=>now(),
                'livreur_id' =>'1',
                'agent_livreur_id'=>'1',
                'statut_livraison'=>'NON_ASSIGNEE',
                'user_id'=>'1',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],

            [
                'ref_operation' =>'Ref2',
                'code_agence'=>'AG_000002',
                'nom_client'=>'Benjamin',
                'prenom_client'=>'Benj1',
                'tel_client'=>'IAI1',
                'adresse_livraison'=>'IAI1',
                'nom_beneficiaire'=>'Khaled',
                'prenom_beneficiaire'=>'Khaled1',
                'tel_beneficiaire'=>'+241 01226311145',
                'montant_livraison'=>500000,
                'nombreBillet10000'=>30,
                'nombreBillet5000'=>40,
                'frais_livraison'=>50000,
                'voucher'=>'2100245603',
                'commission'=>20000,
                'lien_gps'=>'https://google_maps1',
                'date_reception'=>now(),
                'heure_reception'=>now(),
                'date_livraison'=>now(),
                'heure_livraison'=>now(),
                'livreur_id' =>'1',
                'agent_livreur_id'=>'1',
                'statut_livraison'=>'NON_ASSIGNEE',
                'user_id'=>'1',
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
            ]);
    }
}
