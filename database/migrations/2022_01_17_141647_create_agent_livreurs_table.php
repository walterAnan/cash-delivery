<?php

use App\Models\ControlLivraison;
use App\Models\Livreur;
use App\Models\MoyensDeDeplacement;
use App\Models\StatutAgence;
use App\Models\statutAgentLivreur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentLivreursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('codeAgent')->unique();
            $table->string('nomAgent');
            $table->string('prenomAgent');
            $table->string('telephoneAgent');
            $table->string('adresseAgent');
            $table->double('montantCautionAgent');
            $table->double('soldeNetAgent')->nullable();
            $table->foreignIdFor(StatutAgence::class)->nullable();
            $table->foreignIdFor(Livreur::class)->nullable();
            $table->foreignIdFor(ControlLivraison::class)->nullable();
            $table->foreignIdFor(MoyensDeDeplacement::class)->nullable();
            $table->foreignIdFor(statutAgentLivreur::class)->nullable();
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
        Schema::dropIfExists('agent_livreurs');
    }
}
