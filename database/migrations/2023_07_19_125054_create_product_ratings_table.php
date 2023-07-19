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
        Schema::create('product_ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->integer('product_id')->nullable(false); 
            $table->integer('rating')->default(0); 
            $table->text('review')->nullable(false); 
            $table->enum('status', [0, 1])->default(0); // 0-Pending , 1-Approved , 2- Rejected
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->nullable()->userCurrent()->useCurrentOnUpdate();
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
