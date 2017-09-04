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
            $table->string('categorie_fr');
            $table->unsignedInteger('id_taille');
            $table->unsignedInteger('id_couleur');
            $table->unsignedInteger('id_matiere');
            $table->unsignedInteger('credit');
            $table->unsignedInteger('prix');
            $table->string('id_statut');
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
