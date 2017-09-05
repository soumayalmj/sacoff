<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->unsignedInteger('ville_id');
            $table->foreign('ville_id')->references('id')->on('villes');
            $table->unsignedInteger('statut');
            $table->unsignedInteger('pin');
            $table->unsignedInteger('puk');
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
