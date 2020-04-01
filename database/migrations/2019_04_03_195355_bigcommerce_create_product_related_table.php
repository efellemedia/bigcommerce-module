<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_related', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->index();
            $table->unsignedInteger('related_id')->index();

            // Indexes..
            $table->primary(['product_id', 'related_id']);

            // Foreign keys..

            $table->foreign('product_id')->references('id')->on('bigcommerce_products')->onDelete('cascade');
            $table->foreign('related_id')->references('id')->on('bigcommerce_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_product_related');
    }
}
