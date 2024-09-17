<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public static function getSlug($title)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        return $slug;
    }
}
