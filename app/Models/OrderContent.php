<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'book_id', 'amount', 'quantity'
    ];

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
