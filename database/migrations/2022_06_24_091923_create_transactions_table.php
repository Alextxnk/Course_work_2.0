<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transaction_id');
            $table->bigInteger('order_product_id')->unsigned();
            $table->bigInteger('purchase_product_id')->unsigned();
            $table->string('appointment');
            $table->timestamps();
            $table->foreign('order_product_id')->references('order_product_id')->on('order_products');
            $table->foreign('purchase_product_id')->references('purchase_product_id')->on('purchase_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
