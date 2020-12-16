<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreementmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title');
            $table->text('Description');
            $table->integer('user_id');
            $table->string('Flag')->default(0);
            $table->string('FullName');
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
        Schema::dropIfExists('agreementmessages');
    }
}
