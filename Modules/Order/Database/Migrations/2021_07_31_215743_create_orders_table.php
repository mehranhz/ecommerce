<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('price');
            $table->enum('status', ['unpaid', 'paid', 'preparation', 'posted', 'received', 'canceled'])->default('unpaid');
            $table->string('tracking_code')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('item_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');
            $table->string('item_type');
            $table->unsignedBigInteger('quantity');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->primary(['order_id','item_id','item_type']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_order');
        Schema::dropIfExists('orders');
    }
}
