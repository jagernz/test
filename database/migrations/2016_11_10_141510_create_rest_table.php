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
            $table->timestamps();
            $table->integer('day_id')->unsigned();
            $table->foreign('day_id')->references('id')->on('day');
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
