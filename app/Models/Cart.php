<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'cookie_id', 'book_id', 'quantity', 'user_id', 'copy'
    ];

    public static function getCookie()
    {
        $cookie_id = 'theauthorrepubliccom_'.session()->getId();
        if (auth('web')->user()) {
            return ['user_id', auth('web')->id(), $cookie_id];
        }
        return ['cookie_id', $cookie_id];
    }
}
