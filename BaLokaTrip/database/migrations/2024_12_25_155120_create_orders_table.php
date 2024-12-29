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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke pengguna
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade'); // Relasi ke tiket
            $table->integer('quantity'); // Jumlah tiket yang dipesan
            $table->decimal('total_price', 10, 2); // Total harga
            $table->string('voucher_code')->nullable(); // Kode voucher yang digunakan
            $table->decimal('discount', 10, 2)->default(0); // Diskon yang diterapkan
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
