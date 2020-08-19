<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('picture');
            $table->string('sell_type')->nullable();
            $table->float('quant_step');
            $table->float('quantity');
            $table->float('price');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
        });
        Schema::table('order_details', function(Blueprint $table){
           $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
