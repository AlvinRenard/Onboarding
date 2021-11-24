<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceapprovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financeapprovaldb', function (Blueprint $table) {
            $table ->increments('id');
            $table->unsignedBigInteger('EmployeeId');
            $table->foreign('EmployeeId')->references('id')->on('employees');
            $table -> string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financeapprovaldb');
    }
}
