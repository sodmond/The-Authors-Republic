<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payout extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id', 'amount', 'method', 'reference', 'details', 'proof', 'status'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
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
