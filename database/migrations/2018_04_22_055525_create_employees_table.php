<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_name')->nullable();
            $table->integer('emp_age')->nullable();
            $table->integer('emp_type')->nullable();
            $table->integer('emp_gender')->nullable();
            $table->integer('emp_contact')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_education')->nullable();
            $table->datetime('emp_deletedAt')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
