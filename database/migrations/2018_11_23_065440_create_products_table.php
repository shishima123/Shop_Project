<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->text('description');
            $table->text('content');
            $table->decimal('price');
            $table->string('picture');
            $table->unsignedInteger('sale')->default('0')->nullable();
            $table->boolean('new')->default('0')->nullable();
            $table->boolean('top_selling')->default('0')->nullable();
            $table->enum('rating', ['1', '2', '3', '4', '5'])->nullable();
            $table->string('unit');
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
        Schema::dropIfExists('products');
    }
}
