<?php

use App\Models\Agence;
use App\Models\AgentLivreur;
use App\Models\Demande;
use App\Models\Livreur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agence::class);
            $table->foreignIdFor(AgentLivreur::class);
            $table->foreignIdFor(Demande::class);
            $table->string('codeLivraison')->unique();
            $table->dateTime('dateLivraison')->nullable();
            $table->string('statutLivraison');
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
        Schema::dropIfExists('livraisons');
    }
}
