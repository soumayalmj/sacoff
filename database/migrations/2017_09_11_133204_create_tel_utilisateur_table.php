<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelUtilisateurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tel_utilisateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->unsignedInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
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
