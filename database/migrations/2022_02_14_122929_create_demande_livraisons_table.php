<?php

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\Livreur;
use App\Models\StatutDemande;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('ref_operation')->unique();
            $table->char('code_agence',10);
            $table->string('nom_client');
            $table->string('prenom_client');
            $table->string('tel_client');
            $table->string('adresse_livraison');
            $table->string('nom_beneficiaire');
            $table->string('prenom_beneficiaire');
            $table->string('tel_beneficiaire');
            $table->unsignedBigInteger('montant_livraison');
            $table->unsignedInteger('nombreBillet10000');
            $table->unsignedInteger('nombreBillet5000');
            $table->unsignedInteger('frais_livraison');
            $table->string('voucher', 5)->unique();
            $table->unsignedBigInteger('commission');
            $table->string('lien_gps');
            $table->dateTime('date_reception');
            $table->dateTime('heure_reception');
            $table->dateTime('date_livraison');
            $table->dateTime('heure_livraison');
            $table->foreignIdFor(Livreur::class)->nullable();
            $table->foreignIdFor(AgentLivreur::class)->nullable();
            $table->foreignIdFor(StatutDemande::class)->default(StatutDemandeEnum::INITIEE->value);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demande_livraisons');
    }
}
