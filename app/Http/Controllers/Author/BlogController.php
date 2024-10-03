<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\AuthorsBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('author.pro');
    }

    public function index()
    {
        $blog = AuthorsBlog::where('author_id', auth('author')->id())->orderByDesc('created_at')->paginate(10);
        return view('author.blog.index', compact('blog'));
    }

    public function get($id)
    {
        $blogItem = AuthorsBlog::find($id);
        if ($blogItem->author_id != auth('author')->id()) {
            redirect()->back();
        }
        return view('author.blog.single', compact('blogItem'));
    }

    public function new()
    {
        #dd(storage_path('/app/public'));
        return view('author.blog.new');
    }

    public function addNew(Request $request)
    {
        $this->validate($request, [
            'type' => ['required', 'max:10'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:10000'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(1170)->height(400)],
            'video' => ['required_if:type,podcast', 'mimes:mp4', 'max:5120'],
        ]);
        $imgFileName = Str::random(32) . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('author/blog/image', $imgFileName, 'public');
        $thumbnail = ImageManager::imagick()->read($request->file('image')->path());
        $thumbnail->cover(400, 400, 'center')->save(storage_path('/app/public/author/blog/image/thumbnail/') . $imgFileName);
        $contentFile = time() . '.txt';
        Storage::put('author/blog/contents/'.$contentFile, clean($request->description), 'public');
        $authorBlog = new AuthorsBlog();
        $authorBlog->author_id = auth('author')->id();
        $authorBlog->type = $request->type;
        $authorBlog->title = $request->title;
        $authorBlog->content = $contentFile;
        $authorBlog->image = $imgFileName;
        $authorBlog->published_at = $request->published_at;
        if ($request->has('video')) {
            $videoPath = $request->file('video')->store('author/blog/video', 'public');
            $authorBlog->video = $videoPath;
        }
        if ($authorBlog->save()) {
            return back()->with('success', "New $request->type has been added");
        }
        return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
    }

    public function edit($id)
    {
        $blogItem = AuthorsBlog::find($id);
        if ($blogItem->author_id != auth('author')->id()) {
            redirect()->back();
        }
        return view('author.blog.edit', compact('blogItem'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'type' => ['required', 'max:10'],
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:10000'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(1170)->height(400)],
            'video' => ['nullable', 'mimes:mp4', 'max:5120'],
        ]);
        $authorBlog = AuthorsBlog::find($id);
        if ($authorBlog->author_id != auth('author')->id()) {
            return redirect()->back();
        }
        $contentFile = $authorBlog->content;
        Storage::put('author/blog/contents/'.$contentFile, clean($request->description, 'youtube'), 'public');
        $authorBlog->title = $request->title;
        $authorBlog->type = $request->type;
        $authorBlog->content = $contentFile;
        $authorBlog->published_at = $request->published_at;
        if ($request->has('image')) {
            if (Storage::exists('public/author/blog/image/'.$authorBlog->image)) {
                Storage::delete('public/author/blog/image'.$authorBlog->image);
            }
            if (Storage::exists('public/author/blog/image/thumbnail/'.$authorBlog->image)) {
                Storage::delete('public/author/blog/image/thumbnail'.$authorBlog->image);
            }
            $imgFileName = Str::random(32) . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('author/blog/image', $imgFileName, 'public');
            $thumbnail = ImageManager::imagick()->read($request->file('image')->path());
            $thumbnail->cover(400, 400, 'center')->save(storage_path('/app/public/author/blog/image/thumbnail/') . $imgFileName);
            $authorBlog->image = $imgFileName;
        }
        if ($request->has('video')) {
            if (Storage::exists('public/'.$authorBlog->video)) {
                Storage::delete('public/'.$authorBlog->video);
            }
            $videoPath = $request->file('video')->store('author/blog/video', 'public');
            $authorBlog->video = $videoPath;
        }
        if ($authorBlog->save()) {
            $type = ucwords($request->type);
            return back()->with('success', "$type has been updated");
        }
        return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
    }

    public function trash($id)
    {
        $authorBlog = AuthorsBlog::find($id);
        if ($authorBlog->author_id != auth('author')->id()) {
            return redirect()->back();
        }
        if (Storage::exists('public/author/blog/image/'.$authorBlog->image)) {
            Storage::delete('public/author/blog/image/'.$authorBlog->image);
        }
        if (Storage::exists('public/author/blog/image/thumbnail/'.$authorBlog->image)) {
            Storage::delete('public/author/blog/image/thumbnail/'.$authorBlog->image);
        }
        if (Storage::exists('public/'.$authorBlog->video)) {
            Storage::delete('public/'.$authorBlog->video);
        }
        if (Storage::exists('author/blog/contents/'.$authorBlog->content)) {
            Storage::delete('author/blog/contents/'.$authorBlog->content);
        }
        $authorBlog->delete();
        return redirect()->route('author.blog')->with('success', 'Blog has been deleted');
    }
}
