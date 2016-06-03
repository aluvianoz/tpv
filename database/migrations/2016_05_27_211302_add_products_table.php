<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Bluep rint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('description',255);
            $table->integer('stock')->unsigned();
            $table->integer('cost')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('gain')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();

              $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::create('sale_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::drop('products');
    }
}
