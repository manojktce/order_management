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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(false); 
            $table->text('stripe_pi_id')->nullable(); 
            $table->text('stripe_resp')->nullable(); 
            $table->decimal('total_amount',9,2)->nullable(false);
            $table->enum('status', [0, 1])->default(1); // 0-Inactive , 1-Active
            // $table->datetime('created_at')->useCurrent();
            // $table->datetime('updated_at')->nullable()->userCurrent()->useCurrentOnUpdate();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
