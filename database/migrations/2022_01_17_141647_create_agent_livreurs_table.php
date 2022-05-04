<?php

use App\Enums\StatutAgent;
use App\Models\Agence;
use App\Models\ControlLivraison;
use App\Models\Livreur;
use App\Models\Localite;
use App\Models\MoyensDeDeplacement;
use App\Models\StatutAgence;
use App\Models\StatutAgentLivreur;
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
            $table->string('telephoneAgent')->unique();
            $table->string('adresseAgent');
            $table->string('token')->nullable();
            $table->foreignIdFor(Localite::class)->nullable();
            $table->double('montantCautionAgent')->nullable();
            $table->double('soldeNetAgent')->nullable();
            $table->foreignIdFor(Agence::class)->nullable();
            $table->foreignIdFor(Livreur::class)->nullable();
            $table->foreignIdFor(ControlLivraison::class)->nullable();
            $table->foreignIdFor(MoyensDeDeplacement::class)->nullable();
            $table->boolean('estDisponible')->default(false);
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
