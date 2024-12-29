<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika tabel bukan bentuk jamak)
    protected $table = 'faqs';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'question',
        'answer',
    ];
}
