<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductModifierValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_modifier_values', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('modifier_id');
            $table->string('label');
            $table->boolean('is_default');
            $table->text('value_data')->nullable();
            $table->text('adjusters')->nullable();
            $table->unsignedInteger('sort_order');

            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'modifier_id']);
            $table->index('is_default');
            $table->index('sort_order');

            // Foreign key contraints..
            $table->foreign('modifier_id')
                ->references('id')
                ->on('bigcommerce_product_modifiers')
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
        Schema::dropIfExists('bigcommerce_product_modifier_values');
    }
}
