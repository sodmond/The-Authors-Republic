<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'products', 'quantities', 'code', 'note', 'status',
        'subtotal', 'shipping_fee', 'tax', 'total_cost', 'payment_link',
        'transaction_id', 'earning_status'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderContent() : HasMany
    {
        return $this->hasMany(OrderContent::class);
    }

    public static function createOrderCode()
    {
        return 'ORD' . time();
    }

    public static function getTotal($order_id, $book_ids, $quantities, $shipping_fee)
    {
        $subtotal = 0;
        $books = Book::whereIn('id', $book_ids)->get()->keyBy('id');
        $orderContentData = [];
        for($i=0; $i < count($book_ids); $i++) {
            $amount = $books[$book_ids[$i]]->price;
            $subtotal += round($amount * $quantities[$i], 2);
            $orderContentData[] = [
                'order_id' => $order_id,
                'book_id' => $book_ids[$i],
                'amount' => $amount,
                'quantity' => $quantities[$i],
                'created_at' => now()
            ];
        }
        OrderContent::insert($orderContentData);
        $total_cost = ($subtotal + $shipping_fee);
        return ['subtotal' => $subtotal, 'total_cost' => $total_cost];
    }

    public static function getStatusBG($status)
    {
        $bg_color = '';
        switch ($status) {
            case 'completed':
                $bg_color = 'bg-success';
                break;

            case 'cancelled':
                $bg_color = 'bg-danger';
                break;
            
            default:
                $bg_color = 'bg-secondary';
                break;
        }
        return $bg_color;
    }
}
