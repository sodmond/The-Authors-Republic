<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
