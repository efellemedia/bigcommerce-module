<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_option_values', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('option_id');
            $table->string('label');
            $table->text('value_data')->nullable();
            $table->boolean('is_default');
            $table->unsignedInteger('sort_order');
            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'option_id']);
            $table->index('sort_order');

            // Foreign key contraints..
            $table->foreign('option_id')
                ->references('id')
                ->on('bigcommerce_product_options')
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
        Schema::dropIfExists('bigcommerce_product_option_values');
    }
}
