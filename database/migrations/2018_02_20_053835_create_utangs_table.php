<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utangs', function (Blueprint $table) {
            $table->increments('utg_id');
            // $table->integer('out_id')->unsigned();
            // $table->foreign('out_id')->references('out_id')->on('outcomes');
            $table->date('utg_duedate');
            $table->date('utg_paiddate');
            $table->integer('utg_paidamount');
            $table->string('utg_payer');
            $table->integer('utg_status');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->integer('utg_deleteStat');
            $table->datetime('utg_deletedAt');
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
        Schema::dropIfExists('utangs');
    }
}
