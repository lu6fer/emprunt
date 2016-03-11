<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->boolean('borrowable');
            $table->string('brand');
            $table->string('model');
            $table->string('size');
            $table->string('sn_valve');
            $table->string('sn_cylinder');
            $table->integer('test_pressure');
            $table->integer('operating_pressure');
            $table->string('usage');
            $table->integer('owner')->unsigned()->index();
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->unsigned()->index();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::drop('tanks');
    }
}
