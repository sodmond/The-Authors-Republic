<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Models\Article;
use App\Models\Author;
use App\Models\AuthorsBlog;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Cart;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapThree();
        try {
            #$cart = Cart::getCookie();
            $allBooks = Book::all()->keyBy('id');
            $book_categories = BookCategory::where('status', 1)->get(); #dd($book_categories[0]->books);
            $recentNews = Article::orderByDesc('created_at')->take(5)->get();
            $topAuthorBlogs = AuthorsBlog::orderByDesc('created_at')->take(2)->get();
            View::share(compact('allBooks', 'book_categories', 'recentNews', 'topAuthorBlogs'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
