<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('credit_apply')->nullable();
            $table->string('id_passport_path')->nullable();
            $table->string('loan_rate')->nullable();

            $table->string('loan_type')->nullable();
            $table->string('rate_type')->nullable();
            $table->string('occupational_activity')->nullable();
            $table->string('proffessional_status')->nullable();
            $table->string('sendcopy')->nullable();

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
        Schema::dropIfExists('assurances');
    }
}
