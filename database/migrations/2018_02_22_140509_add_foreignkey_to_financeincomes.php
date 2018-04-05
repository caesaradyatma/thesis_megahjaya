<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToFinanceincomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('finance_incomes',function(Blueprint $table){
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->integer('piut_id')->unsigned();
            // $table->foreign('piut_id')->references('piut_id')->on('piutangs');
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
        Schema::table('finance_incomes',function(Blueprint $table){
            $table->dropColumn('piut_id');
        });
    }
}
