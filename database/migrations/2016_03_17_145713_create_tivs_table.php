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
            $table->integer('review_id')->unsigned();
            $table->foreign('review_id')->references('id')->on('tiv_statuses');
            $table->integer('reviewer_id')->unsigned();
            $table->foreign('reviewer_id')->references('id')->on('tiv_statuses');
            $table->dateTime('review_date');
            $table->dateTime('previous_review_date')->nullable();
            $table->dateTime('next_test_date')->nullable();
            $table->integer('review_status_id')->unsigned();
            $table->foreign('review_status_id')->references('id')->on('tiv_statuses');
            $table->dateTime('shipping_date')->nullable();
            $table->integer('valve_id')->unsigned();
            $table->foreign('valve_id')->references('id')->on('tiv_statuses');
            $table->integer('valve_ring_id')->unsigned();
            $table->foreign('valve_ring_id')->references('id')->on('tiv_statuses');
            $table->integer('neck_thread_id')->unsigned();
            $table->foreign('neck_thread_id')->references('id')->on('tiv_statuses');
            $table->integer('neck_thread_size_id')->unsigned();
            $table->foreign('neck_thread_size_id')->references('id')->on('tiv_statuses');
            $table->integer('ext_state_id')->unsigned();
            $table->foreign('ext_state_id')->references('id')->on('tiv_statuses');
            $table->integer('int_state_id')->unsigned();
            $table->foreign('int_state_id')->references('id')->on('tiv_statuses');
            $table->boolean('int_oil')->default(false);
            $table->integer('int_residue_id')->unsigned();
            $table->foreign('int_residue_id')->references('id')->on('tiv_statuses');
            $table->integer('todo_maintenance_id')->unsigned()->nullable();
            $table->foreign('todo_maintenance_id')->references('id')->on('tiv_statuses');
            $table->integer('performed_maintenance_id')->unsigned()->nullable();
            $table->foreign('performed_maintenance_id')->references('id')->on('tiv_statuses');
            $table->integer('recipient_id')->unsigned()->nullable();
            $table->foreign('recipient_id')->references('id')->on('tiv_statuses');
            $table->longText('comment')->nullable();
            $table->integer('decision_id')->unsigned()->nullable();
            $table->foreign('decision_id')->references('id')->on('tiv_statuses');
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

