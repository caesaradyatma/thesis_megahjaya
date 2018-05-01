<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyInvoicesTableDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('inv_date');
            $table->dropColumn('inv_totPrice');
            $table->dropColumn('inv_type');
            $table->dropColumn('inv_status');
            $table->dropColumn('inv_discount');
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->date('inv_date');
            $table->integer('inv_totPrice');
            $table->integer('inv_type');
            $table->integer('inv_status');
            $table->integer('inv_discount');
        });
    }
}
