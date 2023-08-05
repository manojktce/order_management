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
        Schema::create('products_rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false); 
            $table->integer('rating')->default(0); 
            $table->text('review')->nullable(false); 
            $table->enum('status', [0, 1])->default(0); // 0-Pending , 1-Approved , 2- Rejected
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->nullable()->userCurrent()->useCurrentOnUpdate();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_ratings');
    }
};
