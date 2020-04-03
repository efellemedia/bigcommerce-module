<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('sku')->nullable();

            $table->boolean('is_visible');
            $table->boolean('is_featured');

            $table->unsignedInteger('weight');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->unsignedInteger('depth');

            $table->decimal('price', 8, 2);
            $table->decimal('cost_price', 8, 2);
            $table->decimal('retail_price', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->decimal('calculated_price', 8, 2);

            $table->integer('inventory_level');
            $table->integer('inventory_warning_level');
            $table->string('inventory_tracking');
            $table->timestamps();

            // Indexes..
            $table->primary('id');
            $table->index('is_visible');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_products');
    }
}
