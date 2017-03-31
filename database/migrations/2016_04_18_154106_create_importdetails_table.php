<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('importid')->unsigned()->index();
            $table->integer('productid')->unsigned()->index();
            $table->integer('quatity')->default(0);
            $table->float('amount')->default(0);
            $table->timestamps();

            $table->foreign('importid')->references('id')->on('imports')->onUpdate('cascade');
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
        Schema::drop('importdetails');
    }
}
