<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoyensDeDeplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moyen_deplacements', function (Blueprint $table) {
            $table->id();
            $table->string('codeMoyenDeplacement')->unique();
            $table->string('nomMoyenDeplacement');
            $table->string('etatMoyenDeplacement');
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
        Schema::dropIfExists('moyens_de_deplacements');
    }
}
