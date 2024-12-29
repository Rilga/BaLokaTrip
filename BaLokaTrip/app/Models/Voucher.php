<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_amount',
        'discount_percentage',
        'usage_limit',
        'start_date',
        'end_date',
    ];
}