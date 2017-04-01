<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProstoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prostores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('importid')->unsigned()->index();
            $table->integer('productid')->unsigned()->index();
            $table->integer('quatity')->default(0);
            $table->timestamps();

            $table->foreign('importid')->references('id')->on('imports')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('productid')->references('id')->on('products')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prostores');
    }
}
