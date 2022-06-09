<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            //$table->bigInteger('user_id')->unsigned(); // внешний ключ
            $table->bigInteger('buyer_id')->unsigned(); // внешний ключ
            $table->date('date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('buyer_id')->references('buyer_id')->on('buyers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
