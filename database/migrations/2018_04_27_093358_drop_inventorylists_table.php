<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropInventorylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('inventorylists');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::create('inventorylists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name')->nullable();
            $table->mediumText('item_type')->nullable();
            $table->string('personal_code')->nullable();
            $table->string('sku_code')->nullable();
            $table->integer('item_quantity')->nullable();
            $table->string('item_measurement')->nullable();
            $table->integer('item_price')->nullable();
            $table->integer('item_minimum')->nullable();
            $table->integer('item_status')->nullable();
            $table->date('item_delete')->nullable();
            $table->timestamps();
        });
    }
}
