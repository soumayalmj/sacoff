<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('message');
            $table->unsignedInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories_notif');
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
