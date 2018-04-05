<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('piutangs', function (Blueprint $table) {
            $table->increments('piut_id');
            // $table->integer('out_id')->unsigned();
            // $table->foreign('out_id')->references('out_id')->on('outcomes');
            $table->date('piut_duedate');
            $table->date('piut_paiddate')->nullable();
            $table->integer('piut_paidamount')->nullable();
            $table->string('piut_payer')->nullable();
            $table->integer('piut_status')->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->integer('piut_deleteStat')->default(0);
            $table->datetime('piut_deletedAt')->nullable();
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
        Schema::dropIfExists('piutangs');
    }
}
