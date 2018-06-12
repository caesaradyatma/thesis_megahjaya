<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameActcodesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('actcodes', function (Blueprint $table) {
            $table->renameColumn('Action','action');
            $table->renameColumn('Flow','flow');

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
        Schema::table('actcodes', function (Blueprint $table) {
            $table->renameColumn('action','Action');
            $table->renameColumn('flow','Flow');

        });
    }
}
