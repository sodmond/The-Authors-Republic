<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as FrontendController;
use App\Mail\ApprovalStatus;
use App\Mail\SendOrderConfirmation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/terms-conditions', [App\Http\Controllers\HomeController::class, 'tandc'])->name('tandc');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/book/{id}/{slug}', [App\Http\Controllers\BookController::class, 'get'])->name('book');
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors');
Route::get('/author_profile/{id}/{slug}', [App\Http\Controllers\AuthorController::class, 'get'])->name('author');
Route::get('/news', [App\Http\Controllers\ArticlesController::class, 'index'])->name('news');
Route::get('/news/{id}/{slug}', [App\Http\Controllers\ArticlesController::class, 'get'])->name('news.get');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add_item', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove', [App\Http\Controllers\CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkoutSubmit']);
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment.verify');
Route::get('forum', [FrontendController\ForumController::class, 'index'])->name('forum');
Route::post('forum/post/all', [FrontendController\ForumController::class, 'posts'])->name('forum.posts');

Auth::routes();

Route::group(['middleware' => ['auth:web'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [FrontendController\HomeController::class, 'index'])->name('home');
    
    Route::get('orders', [FrontendController\OrderController::class, 'index'])->name('orders');
    Route::get('order/{id}/{code}', [FrontendController\OrderController::class, 'view'])->name('order');
    Route::post('order/book_download', [FrontendController\OrderController::class, 'downloadBook'])->name('book.download');
    
    Route::get('wishlist', [FrontendController\WishListController::class, 'index'])->name('wishlist');
    Route::post('wishlist/add-item', [FrontendController\WishListController::class, 'addItem'])->name('wishlist.add');
    Route::get('profile', [FrontendController\ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [FrontendController\ProfileController::class, 'update'])->name('profile.update');
    Route::get('settings', [FrontendController\SettingsController::class, 'index'])->name('settings');
    Route::put('settings/change_password', [FrontendController\SettingsController::class, 'passwordUpdate'])->name('settings.password.update');

    Route::post('forum/post', [FrontendController\ForumController::class, 'newPost'])->name('forum.post.new');
    Route::get('forum/post/{id}/{slug}', [FrontendController\ForumController::class, 'thread'])->name('forum.post');
    Route::post('forum/post/{id}/comment', [FrontendController\ForumController::class, 'comment'])->name('forum.post.comment');

    Route::get('address_book', [FrontendController\AddressBookController::class, 'index'])->name('addressBook');
    Route::get('address_book_new', [FrontendController\AddressBookController::class, 'new'])->name('addressBook.new');
    Route::post('address_book_new', [FrontendController\AddressBookController::class, 'saveNew'])->name('addressBook.new.save');
    Route::get('address_book/{id}', [FrontendController\AddressBookController::class, 'edit'])->name('addressBook.edit');
    Route::post('address_book/{id}', [FrontendController\AddressBookController::class, 'update'])->name('addressBook.update');
});

Route::get('/mailable', function() {
    return new ApprovalStatus(1);
    #return new SendOrderConfirmation(1, 'ORD373764474');
});
