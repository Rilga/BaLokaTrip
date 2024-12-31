<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'percentage',
        'fixed_amount',
        'valid_from',
        'valid_until',
    ];
    /**
     * Get the discount amount based on ticket price.
     *
     * @param float $ticketPrice
     * @return float
     */
    public function calculateDiscountAmount(float $ticketPrice): float
    {
        if ($this->percentage) {
            $discountAmount = $ticketPrice * ($this->percentage / 100);
        } elseif ($this->fixed_amount) {
            $discountAmount = $this->fixed_amount;
        } else {
            $discountAmount = 0;
        }

        // Return the discount amount, ensuring it doesn't exceed the ticket price
        return min($discountAmount, $ticketPrice);
    }

    /**
     * Check if the discount is valid based on the current date.
     *
     * @return bool
     */
    public function isValid(): bool
    {
        $now = now();
        return (!$this->valid_from || $this->valid_from <= $now) &&
            (!$this->valid_until || $this->valid_until >= $now);
    }
}
