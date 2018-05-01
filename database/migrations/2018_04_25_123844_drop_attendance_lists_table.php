<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAttendanceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('attendance_lists');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::create('attendance_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->date('atd_date')->nullable();
            $table->string('atd_ids')->nullable();
            $table->timestamps();
        });
    }
}
