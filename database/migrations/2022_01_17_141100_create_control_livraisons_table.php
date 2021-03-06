<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_livraisons', function (Blueprint $table) {
            $table->id();
            $table->boolean('est_livreur_interne');
            $table->unsignedBigInteger('montant_min_livraison');
            $table->unsignedBigInteger('montant_max_livraison');
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
        Schema::dropIfExists('control_livraisons');
    }
}
