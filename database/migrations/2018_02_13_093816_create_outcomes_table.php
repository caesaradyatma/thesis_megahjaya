<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->increments('out_id');
            $table->integer('out_type');
            $table->string('out_name');
            $table->integer('out_amount');
            $table->date('out_date');
            $table->mediumText('out_desc');
            $table->integer('user_id');
            $table->timestamps();
            $table->integer('out_deleteStat');
            $table->datetime('out_deletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcomes');
    }
}
