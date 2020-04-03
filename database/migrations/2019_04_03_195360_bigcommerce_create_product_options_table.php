<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_options', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('display_name');
            $table->string('type');
            $table->unsignedInteger('sort_order');
            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'product_id']);
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
        Schema::dropIfExists('bigcommerce_product_options');
    }
}
