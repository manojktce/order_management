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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); 
            $table->enum('status', [0, 1])->default(1); // 0-Inactive , 1-Active
            // $table->datetime('created_at')->useCurrent();
            // $table->datetime('updated_at')->nullable()->userCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
