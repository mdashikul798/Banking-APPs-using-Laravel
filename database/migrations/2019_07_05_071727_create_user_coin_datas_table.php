<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoinDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coin_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bankcode');
            $table->string('cashcode');
            $table->string('swiftcode');
            $table->string('currency')->nullable();
            $table->string('balance')->nullable();
            $table->string('previous_balance')->nullable();
            $table->string('servertime')->nullable();
            $table->string('userIP')->nullable();
            $table->string('code1')->nullable();
            $table->string('code2')->nullable();
            $table->string('code3')->nullable();
            $table->string('minimum_balance')->nullable();

            $table->string('title1')->nullable();
            $table->string('message1')->nullable();
            $table->string('title2')->nullable();
            $table->string('message2')->nullable();
            $table->string('title3')->nullable();
            $table->string('message3')->nullable();
            $table->string('notice1')->nullable();
            $table->string('notice2')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('user_coin_datas');
    }
}
