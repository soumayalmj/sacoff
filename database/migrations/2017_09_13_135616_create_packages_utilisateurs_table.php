<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilisateur_id');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');
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
