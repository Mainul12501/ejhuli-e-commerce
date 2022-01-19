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
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('order_no',50);
            $table->unsignedInteger('customer_address_id');
            $table->foreign('customer_address_id')->references('id')->on('customer_addresses');
            $table->unsignedTinyInteger('payment_method')->comment('1=>Wallet,2=>COD');
            $table->unsignedDecimal('payment_amount',8,2);
            $table->unsignedDecimal('delivery_charge',8,2)->nullable();
            $table->string('additional_info')->nullable();
            $table->string('discounts')->nullable();
            $table->unsignedInteger('status')->default(1)->comment('1=>Pending,2=>Confirmed,3=>Delivered,4=>Canceled');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
