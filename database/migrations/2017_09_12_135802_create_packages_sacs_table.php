<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesSacsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages_sacs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sac_id');
            $table->foreign('sac_id')->references('id')->on('sacs');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');            
            $table->unsignedInteger('quantite');
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
