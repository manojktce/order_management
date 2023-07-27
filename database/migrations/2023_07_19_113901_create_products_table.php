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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(false);
            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->string('title')->unique();
            $table->text('description')->nullable(false); 
            $table->decimal('price',9,2); 
            $table->integer('qty')->default(5); // Set Minimum 5 default quantity for new product
            $table->enum('status', [0, 1])->default(1); // 0-Inactive , 1-Active
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
