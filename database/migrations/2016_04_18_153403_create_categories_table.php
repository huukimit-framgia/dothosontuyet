<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc');
            $table->boolean('status')->default(1);
            $table->integer('seoid')->unsigned();
            $table->integer('parentid')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('seoid')->references('id')->on('seos')->onUpdate('cascade');
            $table->foreign('parentid')->references('id')->on('categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
