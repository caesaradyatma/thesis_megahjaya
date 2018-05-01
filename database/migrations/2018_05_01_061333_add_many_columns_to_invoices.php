<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManyColumnsToInvoices extends Migration
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
            $table->date('inv_date')->nullable()->after('inv_id');
            $table->integer('inv_totPrice')->nullable();
            $table->integer('inv_type')->nullable();
            $table->integer('inv_status')->nullable();
            $table->integer('inv_discount')->nullable();
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
            $table->dropColumn('inv_date');
            $table->dropColumn('inv_totPrice');
            $table->dropColumn('inv_type');
            $table->dropColumn('inv_status');
            $table->dropColumn('inv_discount');
        });
    }
}
