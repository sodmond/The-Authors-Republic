<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorParent extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'title',
        'city',
        'state',
        'zip',
        'dob',
        'relationship',
        'bio',
        'image',
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
