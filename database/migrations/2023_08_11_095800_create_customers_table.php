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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->longText('company_name')->nullable();
            $table->longText('name');
            $table->longText('phone_number');
            $table->longText('street');
            $table->longText('house_number');
            $table->longText('house_number_ex')->nullable();
            $table->longText('postalcode');
            $table->longText('city');
            $table->foreignId('country_id');
            $table->foreignId('user_id');
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
