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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode diskon yang unik
            $table->integer('percentage')->nullable(); // Diskon dalam persen
            $table->integer('fixed_amount')->nullable(); // Diskon dalam nominal
            $table->date('valid_from')->nullable(); // Tanggal mulai berlaku
            $table->date('valid_until')->nullable(); // Tanggal akhir berlaku
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};