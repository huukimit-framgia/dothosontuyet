<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplierid')->unsigned()->index();
            $table->integer('total')->unsigned()->default(0);
            $table->float('amount')->unsigned()->default(0);
            $table->float('paied')->unsigned()->default(0);
            $table->string('desc');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('supplierid')->references('id')->on('suppliers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imports');
    }
}
