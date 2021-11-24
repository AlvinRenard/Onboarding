<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetail', function (Blueprint $table) {
            $table ->increments('id');
            $table->unsignedBigInteger('EmployeeId');
            $table->foreign('EmployeeId')->references('id')->on('employees');
            $table -> string('name');
            $table -> string('address');
            $table -> string('city');
            $table -> string('state');
            $table -> string('postalcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdetail');
    }
}
