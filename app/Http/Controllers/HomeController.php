<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Article;
use App\Models\Author;
use App\Models\AuthorsBlog;
use App\Models\Book;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $featuredBooks = Book::where('featured', true)->orderByDesc('created_at')->take(10)->get();
        $books = Book::orderByDesc('created_at')->take(12)->get();
        $latestNews = Article::orderByDesc('published_at')->take(10)->get();
        $authors = Author::orderByDesc('created_at')->take(10)->get();
        $authorsBlog = AuthorsBlog::orderByDesc('published_at')->take(10)->get(); #dd($authorsBlog->count());
        return view('home', compact('books', 'featuredBooks', 'latestNews', 'authorsBlog'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactForm(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:1500'],
        ]);
        try {
            Mail::to('info@theauthorsrepublic.com')->send(new ContactForm($request->all()));
            return back()->with('success', 'Contact form has been submitted, we will get back to you shortly.');
        } catch(\Exception $e) {
            Log:info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Unable to submit contact form, pls try again.']);
        }
    }

    public function tandc()
    {
        return view('terms_conditions');
    }

    public function newsletter(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email:rfc,dns', 'unique:newsletters']
        ]);
        try {
            Newsletter::create([
                'email' => $request->email
            ]);
            return back()->with('newsletter_suc', 'You have just subscribed to our newsletter');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back();
        }
    }
}
