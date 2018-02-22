<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUtgidToOutcomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('outcomes',function(Blueprint $table){
            //$table->integer('utg_id')->unsigned();
            $table->foreign('utg_id')->references('utg_id')->on('utangs');
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
        Schema::table('outcomes',function(Blueprint $table){
            $table->dropColumn('utg_id');
        });

    }
}
