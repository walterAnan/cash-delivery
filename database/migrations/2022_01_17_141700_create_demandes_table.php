<?php

use App\Models\Client;
use App\Models\Livraison;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('montantDemande');
            $table->unsignedBigInteger('fraisDemande');
            $table->unsignedInteger('nombreBillet10000');
            $table->unsignedInteger('nombreBillet5000');
            $table->enum('statut', ['ASSIGNEE', 'NON_ASSIGNEE', 'ANNULEE'])->default('NON_ASSIGNEE');
            $table->foreignIdFor(Client::class);
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
        Schema::dropIfExists('demandes');
    }
}
