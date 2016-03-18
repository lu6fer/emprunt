<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTivsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tivs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tank_id')->unsigned();
            $table->foreign('tank_id')->references('id')->on('tanks')->onDelete('cascade');
            $table->string('review');
            $table->integer('reviewer')->unsigned();
            $table->foreign('reviewer')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('review_date');
            $table->dateTime('previous_review_date');
            $table->string('review_status');
            $table->dateTime('shipping_date');
            $table->integer('valve')->unsigned();
            $table->foreign('valve')->references('id')->on('tiv_statuses');
            $table->integer('valve_ring')->unsigned();
            $table->foreign('valve_ring')->references('id')->on('tiv_statuses');
            $table->integer('neck_thread')->unsigned();
            $table->foreign('neck_thread')->references('id')->on('tiv_statuses');
            $table->integer('neck_thread_size')->unsigned();
            $table->foreign('neck_thread_size')->references('id')->on('tiv_statuses');
            $table->integer('ext_state')->unsigned();
            $table->foreign('ext_state')->references('id')->on('tiv_statuses');
            $table->integer('int_state')->unsigned();
            $table->foreign('int_state')->references('id')->on('tiv_statuses');
            $table->boolean('int_oil')->default(false);
            $table->integer('int_residue')->unsigned();
            $table->foreign('int_residue')->references('id')->on('tiv_statuses');
            $table->integer('todo_maintenance')->unsigned();
            $table->foreign('todo_maintenance')->references('id')->on('tiv_statuses');
            $table->integer('performed_maintenance')->unsigned();
            $table->foreign('performed_maintenance')->references('id')->on('tiv_statuses');
            $table->longText('comment');
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
        Schema::drop('tivs');
    }
}

