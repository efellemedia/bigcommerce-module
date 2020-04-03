<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_images', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('product_id');
            $table->string('description')->nullable();
            $table->unsignedInteger('sort_order');
            $table->boolean('is_thumbnail');
            $table->string('url_standard');
            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'product_id']);
            $table->index('is_thumbnail');
            $table->index('sort_order');

            // Foreign key contraints..
            $table->foreign('product_id')
                ->references('id')
                ->on('bigcommerce_products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_product_images');
    }
}
