<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinanceincomeDeletestatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('finance_incomes',function($table){
            $table->integer('in_deleteStat');
            $table->datetime('in_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('finance_incomes',function($table){
            $table->dropColumn('in_deleteStat');
            $table->dropColumn('in_deletedAt');
        });
    }
}
