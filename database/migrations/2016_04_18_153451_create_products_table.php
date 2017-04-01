<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('thumb')          ->default('images/default.png');
            $table->float('imprice', 11)     ->unsigned()   ->default(0);
            $table->float('price', 11)       ->unsigned()   ->default(0);
            $table->integer('sale')          ->unsigned()   ->default(0);
            $table->string('shortdesc', 150);
            $table->string('longdesc');
            $table->integer('viewed')        ->unsigned()   ->default(0);
            $table->boolean('status')        ->default(1);
            $table->tinyInteger('mark')      ->default(0);
            $table->integer('seoid')         ->unsigned();
            $table->integer('categoryid')    ->unsigned()   ->nullable();
            $table->timestamps();

            $table->foreign('seoid')      ->references('id')->on('seos')      ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categoryid') ->references('id')->on('categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
