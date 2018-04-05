<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('incomes', function (Blueprint $table) {
            $table->increments('in_id');
            $table->integer('in_type');
            $table->string('in_name');
            $table->integer('in_amount');
            $table->date('in_date');
            $table->mediumText('in_desc')->nullable();
            $table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->integer('in_deleteStat')->default(0);
            $table->datetime('in_deletedAt')->nullable();
            $table->integer('piut_id')->unsigned();
            //$table->foreign('piut_id')->references('piut_id')->on('piutangs');
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
        Schema::dropIfExists('incomes');
    }
}
