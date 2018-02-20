<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('inv_id');
            $table->integer('inv_number');
            //$table->string('inv_itemName');
            //$table->string('inv_quantity');
            $table->date('inv_date');
            $table->mediumText('inv_address');
            $table->integer('inv_totPrice');
            $table->integer('inv_type');
            $table->integer('inv_status');
            $table->integer('inv_discount');
            //$table->integer('inv_profitPercentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
