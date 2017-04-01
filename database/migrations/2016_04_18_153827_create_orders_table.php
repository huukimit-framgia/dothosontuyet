<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customerid')->unsigned()->nullable()->index();
            $table->integer('userid')->unsigned()->nullable()->index();
            $table->integer('total')->unsigned()->default(0);
            $table->float('amount')->unsigned()->default(0);
            $table->string('payment')->nullable();
            $table->string('paymentinfo')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('customerid')->references('id')->on('customers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
