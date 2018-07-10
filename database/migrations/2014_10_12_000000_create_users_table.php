<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('user_group_ID')->foreign('user_group_ID')->references('id')->on('usergroup')->default(0);
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('uname');
            $table->string('password');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('country');
            $table->integer('zipcode');
            $table->integer('status')->default(0);
            $table->time('lastlogin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
