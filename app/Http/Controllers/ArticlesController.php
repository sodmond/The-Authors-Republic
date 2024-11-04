<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('published_at')->paginate(10);
        return view('news', compact('articles'));
    }

    public function get($id, $slug)
    {
        $article = Article::find($id);
        return view('news_details', compact('article'));
    }
}
