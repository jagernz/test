<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day', function (Blueprint $table) {
            $table->increments('id');
            $table->time('time_begin');
            $table->string('day');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->unique();
            $table->time('time_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('day');
    }
}
