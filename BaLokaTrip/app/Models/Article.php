<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article'; // Nama tabel
    protected $fillable = [
        'judul',
        'konten',
        'gambar',
        'user_id',
    ];
}
