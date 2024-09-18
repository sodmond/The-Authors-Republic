<?php

namespace App\Providers;

use App\Http\Controllers\CartController;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();

        try {
            #$cart = Cart::getCookie();
            $allBooks = Book::all()->keyBy('id');
            View::share(compact('allBooks'));
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
