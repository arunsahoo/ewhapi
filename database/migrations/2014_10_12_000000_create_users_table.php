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
            $table->integer('UserGroupID');
            $table->string('EmailID')->unique();
            $table->integer('PhoneNo');
            $table->string('UName');
            $table->string('Password');
            $table->string('FName');
            $table->string('LName');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->integer('Country');
            $table->integer('ZipCode');
            $table->integer('Status');
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
