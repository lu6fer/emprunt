<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->boolean('active');
            $table->string('brand');
            $table->string('model');
            $table->string('size');
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
        Schema::drop('stabs');
    }
}
