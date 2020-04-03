<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('title');
            $table->string('text');
            $table->string('status');
            $table->unsignedInteger('rating');
            $table->timestamp('date_created');
            $table->timestamp('date_modified');
            $table->timestamp('date_reviewed');

            // Indexes..
            $table->primary(['id', 'product_id']);
            $table->index('rating');
            $table->index('status');

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
        Schema::dropIfExists('bigcommerce_product_reviews');
    }
}
