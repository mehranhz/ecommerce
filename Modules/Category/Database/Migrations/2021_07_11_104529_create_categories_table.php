<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('serial', 255);
            $table->text('tags');
            $table->unsignedBigInteger('parent')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
        });

        Schema::create('category_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product');
            $table->foreign('product')->references('id')->on('products');

            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories');

            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');

            $table->unique(['category','product']);
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
        Schema::dropIfExists('categories');
    }
}
