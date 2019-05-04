<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ind_client_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientid');
            $table->string('clientName');
            $table->string('contactNo');
            $table->string('altContactNo');
            $table->string('email');
            $table->string('address');
            $table->string('casid');
            $table->foreign('caseid')->references('caseid')->on('reg_cases')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ind_client_details');
    }
}
