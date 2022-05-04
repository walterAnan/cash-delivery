<?php

use App\Models\Agence;
use App\Models\ControlLivraison;
use App\Models\statutLivreur;
use App\Models\TypeLivreur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivreursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->string('codeLivreur')->unique();
            $table->string('nomResponsable');
            $table->string('prenomResponsable');
            $table->string('raisonSociale');
            $table->string('telephoneResponsable');
            $table->string('adresseLivreur');
            $table->string('emailLivreur');
            $table->unsignedInteger('cautionLivreur');
            $table->string('telephoneLivreur');
            $table->enum('modeCommission', ['TAUX', 'MONTANT_FIX']);
            $table->unsignedInteger('valeurCommission');
//            $table->enum('typeLivreur', ['INTERNE', 'EXTERNE']);
            $table->foreignIdFor(Agence::class);
            $table->foreignIdFor(ControlLivraison::class);
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
        Schema::dropIfExists('livreurs');
    }
}
