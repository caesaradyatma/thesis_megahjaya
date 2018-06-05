<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('payroll_name')->nullable();
            $table->text('payroll_condition')->nullable();
            $table->integer('payroll_amount')->nullable();
            $table->date('up_date')->nullable();
            $table->date('deleted_at')->nullable();
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
        //
        Schema::dropIfExists('payrolls');
    }
}
