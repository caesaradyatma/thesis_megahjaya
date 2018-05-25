<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionAndInvIdToPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('piutangs', function (Blueprint $table) {
            $table->string('piut_name')->nullable();
            $table->integer('piut_amount')->nullable();
            $table->string('piut_desc')->nullable();
            $table->integer('inv_id')->nullable();

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
        Schema::table('piutangs', function (Blueprint $table) {
            $table->dropColumn('piut_name');
            $table->dropColumn('piut_amount');
            $table->dropColumn('piut_desc');
            $table->dropColumn('inv_id');
        });
    }
}
