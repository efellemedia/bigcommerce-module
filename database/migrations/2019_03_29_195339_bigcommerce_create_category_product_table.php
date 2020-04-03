<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');

            // Indexes..
            $table->primary(['category_id', 'product_id']);

            // Foreign keys..
            $table->foreign('category_id')->references('id')->on('bigcommerce_categories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('bigcommerce_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_category_product');
    }
}
