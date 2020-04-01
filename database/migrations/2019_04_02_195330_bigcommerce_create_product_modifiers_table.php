<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_modifiers', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('product_id');
            $table->string('name');
            $table->string('display_name');
            $table->string('type');
            $table->boolean('required');
            $table->text('config')->nullable();
            $table->unsignedInteger('sort_order');

            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'product_id']);
            $table->index('required');
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
        Schema::dropIfExists('bigcommerce_product_modifiers');
    }
}
