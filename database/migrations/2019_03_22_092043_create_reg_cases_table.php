<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientTypeSelection');
            $table->string('typeofwork');
            $table->string('amount');
            $table->string('clientname');
            $table->string('contactno')->unique();
            $table->string('email')->unique();
            $table->string('time2');
            $table->string('altno');
            $table->string('address');
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
        Schema::dropIfExists('reg_cases');
    }
}
