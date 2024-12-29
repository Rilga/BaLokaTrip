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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode voucher
            $table->decimal('discount_amount', 10, 2)->nullable(); // Diskon tetap
            $table->integer('discount_percentage')->nullable(); // Diskon persentase
            $table->integer('usage_limit')->default(1); // Batas penggunaan
            $table->timestamp('start_date')->nullable(); // Tanggal mulai berlaku
            $table->timestamp('end_date')->nullable(); // Tanggal kadaluarsa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
