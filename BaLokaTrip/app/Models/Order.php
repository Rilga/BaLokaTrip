<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ticket_id',
        'quantity',
        'total_price',
        'voucher_code',
        'discount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function product()
    {
        return $this->hasManyThrough(Product::class, Ticket::class);  // Relasi ke Product melalui Ticket
    }
    
}
