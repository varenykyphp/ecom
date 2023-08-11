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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable();
            $table->decimal('amount',4,2);
            $table->enum('type',['percentage','sum']);
            $table->longText('description')->nullable();
            $table->date('expires_at')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('active')->default(0);
            $table->longText('code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};