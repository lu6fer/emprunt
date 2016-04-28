<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegulatorBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulator_buys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('regulator_id')->unsigned();
            $table->foreign('regulator_id')->references('id')->on('regulators');
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
        Schema::drop('regulator_buys');
    }
}
