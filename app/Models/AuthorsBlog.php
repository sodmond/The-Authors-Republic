<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AuthorsBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id', 'type', 'title', 'content', 'image', 'video', 'published_at'
    ];

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(AuthorsBlogComment::class)->orderByDesc('created_at');
    }
}
