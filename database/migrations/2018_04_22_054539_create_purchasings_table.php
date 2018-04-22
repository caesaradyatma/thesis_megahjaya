<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pch_vendorname')->nullable();
            $table->string('pch_itemname')->nullable();
            $table->string('pch_code')->nullable();
            $table->string('pch_measurement')->nullable();
            $table->integer('pch_quantity')->nullable();
            $table->string('pch_paytype')->nullable();
            $table->string('pch_status')->nullable();
            $table->string('pch_arivalstat')->nullable();
            $table->string('pch_description')->nullable();
            $table->date('pch_delete')->nullable();
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
        Schema::dropIfExists('purchasings');
    }
}
