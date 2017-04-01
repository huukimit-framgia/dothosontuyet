<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('address')->nullable();
            $table->date('birthday')->nullable();
            $table->boolean('gender')->default(true);           // true is male, false is female
            $table->string('avatar')->nullable()->default('images/user.png');
            $table->boolean('actived')->default(false);
            $table->boolean('blocked')->default(false);
            $table->integer('groupid')->unsigned()->default(USER)->index();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('groupid')->references('id')->on('groups')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
