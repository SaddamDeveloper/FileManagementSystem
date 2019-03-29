<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_to_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('caseid');
            $table->string('clientName');
            $table->string('contactNo');
            $table->string('deliveryDate');
            $table->string('assignedEmployee');
            $table->string('remarks');
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
        Schema::dropIfExists('send_to_employees');
    }
}
