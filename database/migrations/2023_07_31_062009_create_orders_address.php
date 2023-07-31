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
        Schema::create('orders_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orders_id')->nullable(false);
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->integer('mobile_number')->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('city')->nullable(false);
            $table->integer('zipcode')->nullable(false);
            $table->text('notes')->nullable(false);


            $table->foreign('orders_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_address');
    }
};
