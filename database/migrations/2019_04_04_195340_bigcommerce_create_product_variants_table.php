<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_variants', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('option_id')->nullable();
            $table->unsignedBigInteger('option_value_id')->nullable();
            $table->string('sku');

            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('depth')->nullable();

            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('cost_price', 8, 2)->nullable();
            $table->decimal('retail_price', 8, 2)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->decimal('calculated_price', 8, 2)->nullable();

            $table->integer('inventory_level');
            $table->integer('inventory_warning_level');
            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'product_id']);
            $table->index('option_id');
            $table->index('option_value_id');
            $table->index('sku');

            // Foreign key contraints..
            $table->foreign('product_id')->references('id')->on('bigcommerce_products')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('bigcommerce_product_options')->onDelete('cascade');
            $table->foreign('option_value_id')->references('id')->on('bigcommerce_product_option_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_product_variants');
    }
}
