<?php

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
            $table->increments('id');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('phone_fix');
            $table->string('phone_mob');
            $table->string('phone_work');
            $table->string('licence');
            $table->string('password', 255);
            $table->boolean('active');
            $table->boolean('tank')->default(false);
            $table->boolean('stab')->default(false);
            $table->boolean('regulator')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
