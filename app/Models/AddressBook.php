<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'fname', 'lname', 'address', 'city', 'zip', 'state', 'default'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
