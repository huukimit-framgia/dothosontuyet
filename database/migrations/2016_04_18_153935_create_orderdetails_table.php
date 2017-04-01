<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderid')->unsigned()->index();
            $table->integer('productid')->unsigned()->index();
            $table->integer('quatity')->unsigned()->default(0);
            $table->float('amount')->default(0);
            $table->timestamps();

            $table->foreign('orderid')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('productid')->references('id')->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orderdetails');
    }
}
