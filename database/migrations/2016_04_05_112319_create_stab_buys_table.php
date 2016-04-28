<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStabBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stab_buys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stab_id')->unsigned();
            $table->foreign('stab_id')->references('id')->on('stabs');
            $table->dateTime('date');
            $table->float('price')->default('0');
            $table->string('shop')->nullable();
            $table->float('sell_price')->nullable();
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
        Schema::drop('stab_buys');
    }
}
