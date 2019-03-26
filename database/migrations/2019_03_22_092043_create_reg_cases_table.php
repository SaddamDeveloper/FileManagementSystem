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
            $table->string('caseid')->primary();
            $table->string('clientType');
            $table->string('typeofwork');
            $table->string('time2');
            $table->string('amount');
            $table->string('paymentmode');
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
