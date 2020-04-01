<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_product_rules', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('product_id');
            $table->string('image_url');
            $table->boolean('enabled');
            $table->boolean('stop');
            $table->boolean('purchasing_disabled')->default(0);
            $table->boolean('purchasing_hidden')->default(0);
            $table->string('purchasing_disabled_message')->nullable();
            $table->unsignedInteger('sort_order');
            $table->text('price_adjuster')->nullable();
            $table->text('weight_adjuster')->nullable();
            $table->text('conditions')->nullable();
            $table->timestamps();

            // Indexes..
            $table->primary(['id', 'product_id']);
            $table->index('sort_order');
            $table->index('enabled');
            $table->index('purchasing_disabled');
            $table->index('purchasing_hidden');

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
        Schema::dropIfExists('bigcommerce_product_rules');
    }
}
