<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderByDesc('created_at')->paginate(12);
        return view('admin.articles.index', compact('articles'));
    }

    public function get($id)
    {
        $article = Article::find($id);
        return view('admin.articles.single', compact('article'));
    }

    public function new()
    {
        return view('admin.articles.new');
    }

    public function addNew(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:3000'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(800)->height(600)],
        ]);
        $imgPath = $request->file('image')->store('articles', 'public');
        $contentFile = time() . '.txt';
        Storage::put('articles/contents/'.$contentFile, clean($request->description), 'public');
        $article = new Article;
        $article->title = $request->title;
        $article->content = $contentFile;
        $article->image = $imgPath;
        $article->published_at = now();
        if ($article->save()) {
            return back()->with('success', 'New article has been added');
        }
        return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:3000'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(800)->height(600)],
        ]); #dd(clean($request->description));
        $article = Article::find($id);
        $contentFile = $article->content;
        Storage::put('articles/contents/'.$contentFile, clean($request->description), 'public');
        $article->title = $request->title;
        $article->published_at = $request->published_at;
        if ($request->hasFile('image')) {
            if (Storage::exists('public/'.$article->image)) {
                Storage::delete('public/'.$article->image);
            }
            $imgPath = $request->file('image')->store("books", 'public');
            $article->image = $imgPath;
        }
        if ($article->save()) {
            return back()->with('success', 'Article has been updated');
        }
        return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if (Storage::exists('public/'.$article->image)) {
            Storage::delete('public/'.$article->image);
        }
        if (Storage::exists('articles/contents/'.$article->content)) {
            Storage::delete('articles/contents/'.$article->content);
        }
        $article->delete();
        return redirect()->route('admin.articles')->with('success', 'Article has been deleted');
    }
}
