<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTankBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tank_buys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('cascade');
            $table->string('maker');
            $table->string('thread_type');
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
        Schema::drop('tank_buys');
    }
}
