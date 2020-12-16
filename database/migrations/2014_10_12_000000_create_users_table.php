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
            $table->string('name');
            $table->string('account_no');
            $table->string('email')->unique();
            $table->integer('age');
            $table->string('phone');
            $table->string('address');
            $table->bigInteger('postalcode');
            $table->string('country');
            $table->string('account_type');
            $table->string('profile_image');
            $table->string('password');
            $table->boolean('blocked');
            $table->boolean('verify')->default();
            $table->string('code')->nullable();

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
