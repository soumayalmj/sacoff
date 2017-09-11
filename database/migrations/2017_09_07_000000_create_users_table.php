<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('username')->unique();
            $table->string('adresse');
            $table->unsignedInteger('pay_country_id');
            $table->foreign('pay_country_id')->references('id')->on('pay_country');
            $table->timestamp('confirmation')->nullable();
            $table->string('password');
            $table->string('puk');
            $table->string('token');
            $table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
