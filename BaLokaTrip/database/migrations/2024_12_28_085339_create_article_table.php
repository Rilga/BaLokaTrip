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
        Schema::create('article', function (Blueprint $table) {
            $table->id(); // Kolom id (primary key, auto increment)
            $table->string('judul', 255); // Kolom judul (varchar 255)
            $table->text('konten'); // Kolom konten (text)
            $table->string('gambar', 255)->nullable(); // Kolom gambar (varchar 255, nullable)
            $table->unsignedBigInteger('user_id'); // Kolom user_id (foreign key)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
