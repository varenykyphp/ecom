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
        Schema::create('order2_products', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->decimal('price',10,4);
            $table->decimal('total',10,4);
            $table->foreignId('order_id');
            $table->foreignId('tax_rate_id');
            $table->foreignId('product_id');
            $table->enum('status',['pending','shipped'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
