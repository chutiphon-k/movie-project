<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('facebook_id')->unique();
            $table->string('avatar');
            $table->rememberToken();
            $table->timestamps();
            // $table->primary('review_id');
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
