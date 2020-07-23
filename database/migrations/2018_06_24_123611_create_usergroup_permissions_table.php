<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsergroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergroup_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PermissionID')->foreign('PermissionID')->references('id')->on('userpermission');
            $table->integer('UserGroupID')->foreign('UserGroupID')->references('id')->on('usergroup');
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
        Schema::dropIfExists('usergroup_permissions');
    }
}
