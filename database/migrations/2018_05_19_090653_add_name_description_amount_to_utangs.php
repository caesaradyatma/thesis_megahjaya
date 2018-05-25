<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameDescriptionAmountToUtangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('utangs', function (Blueprint $table) {
            $table->string('utg_name')->nullable();
            $table->integer('utg_amount')->nullable();
            $table->string('utg_desc')->nullable();
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
        Schema::table('utangs', function (Blueprint $table) {
            $table->dropColumn('utg_name');
            $table->dropColumn('utg_amount');
            $table->dropColumn('utg_desc');
        });
    }
}
