<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BigCommerceCreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bigcommerce_customers', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->timestamps();

            // Indexes..
            $table->primary('id');
            $table->index('group_id');
            $table->index('email');

            // Foreign key contraints..
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bigcommerce_customers');
    }
}
