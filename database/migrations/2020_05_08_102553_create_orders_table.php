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
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_contact');
            $table->string('customer_address');
            $table->string('delivery_area');
            $table->integer('delivery_fee');
            $table->string('order_status');
            $table->float('order_price');
            $table->string('order_comment')->nullable();
            $table->integer('loyalty_earned')->nullable();
            $table->integer('loyalty_spent')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
