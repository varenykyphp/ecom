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
            $table->longText('uuid');
            $table->decimal('subtotal',10,4);
            $table->decimal('shipping',10,4);
            $table->decimal('coupon',10,4);
            $table->decimal('tax',10,4);
            $table->decimal('total',10,4);
            $table->enum('status',['pending', 'paid', 'cancelled', 'completed', 'returned'])->default('pending');
            $table->foreignId('tax_rate_id');
            $table->foreignId('delivery_customer_id');
            $table->foreignId('billing_customer_id');
            $table->timestamps();
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
