<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_visible');
            $table->timestamps();

            // Indexes..
            $table->primary('id');
            $table->index('parent_id');
            $table->index('is_visible');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_categories');
    }
}
