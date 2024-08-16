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
        Schema::create('coupon_redemptions', function (Blueprint $table) {
            $table->id();
            $table->string('MerchantID')->nullable();
            $table->integer('product_id')->default(0);
            $table->string('product_name')->nullable();
            $table->decimal('product_price',10,2)->default(0.00);
            $table->string('coupon_code')->nullable();
            $table->string('nappy_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_redemptions');
    }
};
