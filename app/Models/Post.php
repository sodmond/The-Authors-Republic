<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'user_type', 'title', 'body'
    ];

    /*public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }*/

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

    public static function getSlug($title)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        return $slug;
    }
}
