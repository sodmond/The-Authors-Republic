<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuthorsBlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'authors_blog_id', 'user_type', 'user_id', 'body'
    ];

    public function authorsBlog() : BelongsTo
    {
        return $this->belongsTo(AuthorsBlog::class);
    }
}
