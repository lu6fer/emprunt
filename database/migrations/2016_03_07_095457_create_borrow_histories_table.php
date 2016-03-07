<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('device_type');
            $table->string('device_number');
            $table->string('device_description');
            $table->dateTime('borrow_date');
            $table->dateTime('return_date')->nullable()->default(DB::raw('NOW()'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('borrow_histories');
    }
}
