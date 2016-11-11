<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comments');
            $table->time('created_at');
            $table->time('updated_at')->nullable();
            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('day');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rest');
    }
}
