<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('ref')->nullable();
            $table->integer('approved')->nullable();
            $table->integer('deleted')->default('0');
            $table->tinyInteger('vies')->default('0');
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
