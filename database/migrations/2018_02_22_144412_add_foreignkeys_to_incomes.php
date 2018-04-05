<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function($table){
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('piut_id')->references('piut_id')->on('piutangs')->onDelete('cascade');
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
        Schema::table('incomes', function($table){
            $table->dropColumn('piut_id');
            $table->dropColumn('user_id');
        });
    }
}
