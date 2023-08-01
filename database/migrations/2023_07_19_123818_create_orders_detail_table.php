<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable(false);
            $table->unsignedBigInteger('products_id')->nullable(false);
            $table->decimal('price', 9, 2)->nullable(false);
            $table->integer('qty')->nullable(false);
            $table->decimal('amount', 9, 2)->nullable(false); 
           
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('products_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
