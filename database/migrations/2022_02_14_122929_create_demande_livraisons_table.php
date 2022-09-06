<?php

use App\Enums\StatutDemandeEnum;
use App\Models\AgentLivreur;
use App\Models\Livreur;
use App\Models\MotifSuppression;
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
            $table->string('code_agence');
            $table->string('nom_client');
            $table->string('tel_client');
            $table->string('adresse_livraison');
            $table->string('nom_beneficiaire');
            $table->string('tel_beneficiaire');
            $table->double('montant_livraison');
            $table->unsignedInteger('nombreBillet10000');
            $table->unsignedInteger('nombreBillet5000');
            $table->double('frais_livraison');
            //$table->double('commission');
            $table->string('voucher', 5)->unique();
            $table->string('lien_gps');
            $table->dateTime('date_reception');
            $table->dateTime('date_livraison');
            $table->foreignIdFor(Livreur::class)->nullable();
            $table->foreignIdFor(AgentLivreur::class)->nullable();
            $table->foreignIdFor(StatutDemande::class)->default(1);
            $table->foreignIdFor(MotifSuppression::class)->default(1);
            $table->foreignIdFor(User::class);
            $table->String('desc_motif_annulation')->nullable();
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
