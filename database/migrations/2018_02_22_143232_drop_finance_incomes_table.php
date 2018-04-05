<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFinanceIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('finance_incomes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('finance_incomes', function (Blueprint $table) {
            $table->increments('in_id');
            $table->integer('in_type');
            $table->string('in_name');
            $table->integer('in_amount');
            $table->date('in_date');
            $table->mediumText('in_desc');
            $table->integer('user_id');
            $table->timestamps();
        });
    }
}
