<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->unsignedInteger('entreprise_id');
            $table->foreign('entreprise_id')->references('id')->on('entreprises');            
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
