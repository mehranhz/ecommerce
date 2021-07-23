<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->id();
            $table->string('title',255);
            $table->text('images')->nullable();
            $table->text('review')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();

            $table->unsignedBigInteger('basePrice')->nullable();
            $table->integer('discount')->default(0);
            $table->integer('inventory')->default(0);
            $table->boolean('available')->default(false);

            $table->text('specifications')->nullable();
            $table->integer('rate')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
