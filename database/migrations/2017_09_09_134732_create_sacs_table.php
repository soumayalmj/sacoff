<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('description_fr');
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories_sacs');
            $table->unsignedInteger('taille_id');
            $table->foreign('taille_id')->references('id')->on('tailles_sacs');
            $table->unsignedInteger('couleur_id');
            $table->foreign('couleur_id')->references('id')->on('couleurs_sacs');
            $table->unsignedInteger('matiere_id');
            $table->foreign('matiere_id')->references('id')->on('matieres_sacs');
            $table->unsignedInteger('credit');
            $table->unsignedInteger('prix');
            $table->unsignedInteger('statut_id');
            $table->unsignedInteger('statut');
            $table->string('token');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
