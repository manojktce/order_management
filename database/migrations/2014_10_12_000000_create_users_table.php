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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('avatar')->nullable(); 
            $table->text('social_login_id')->nullable();
            $table->text('stripe_id')->nullable();
            $table->enum('status', [0, 1])->default(1); // 0-Inactive , 1-Active
            $table->datetime('created_at')->useCurrent();
            $table->datetime('updated_at')->nullable()->userCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
