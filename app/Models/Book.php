<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    public static function getCategoryName($id)
    {
        $category = DB::table('book_categories')->where('id', $id)->first();
        return $category->title;
    }

    public function author() : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function bookCategories() : BelongsTo
    {
        return $this->belongsTo(BookCategory::class, 'category_id');
    }

    public function bookReviews() : HasMany
    {
        return $this->hasMany(BookReview::class);
    }

    public static function getSlug($title)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        return $slug;
    }
}
