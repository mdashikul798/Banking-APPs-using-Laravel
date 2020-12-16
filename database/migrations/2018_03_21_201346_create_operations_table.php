<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeiban')->nullable();
            $table->string('codebic')->nullable();
            $table->string('account_from');
            $table->string('account_to');
            $table->string('description');
            $table->string('direction');
            $table->string('amount');
            $table->string('bank');
            $table->string('holderName')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('comment');
            $table->string('timer')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('operations');
    }
}
