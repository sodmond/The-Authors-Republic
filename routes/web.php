<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as FrontendController;
use App\Mail\ApprovalStatus;
use App\Mail\ContactForm;
use App\Mail\SendOrderConfirmation;
use App\Mail\ServiceApplication;

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
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contactForm']);
Route::post('/newsletter', [App\Http\Controllers\HomeController::class, 'newsletter'])->name('newsletter');
Route::get('/terms-conditions', [App\Http\Controllers\HomeController::class, 'tandc'])->name('tandc');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacy_policy');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/books-category/{id}/{slug}', [App\Http\Controllers\BookController::class, 'category'])->name('books.category');
Route::get('/book/{id}/{slug}', [App\Http\Controllers\BookController::class, 'get'])->name('book');
Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors');
Route::get('/author-profile/{id}/{slug}', [App\Http\Controllers\AuthorController::class, 'get'])->name('author');
Route::get('/authors-corner', [App\Http\Controllers\AuthorController::class, 'blog'])->name('authors.corner');
Route::get('/authors-corner/blog/{id}/{slug}', [App\Http\Controllers\AuthorController::class, 'singleBlog'])->name('authors.blog');
Route::post('/authors-corner/blog/{id}/comment', [App\Http\Controllers\AuthorController::class, 'blogComment']);
Route::get('/news', [App\Http\Controllers\ArticlesController::class, 'index'])->name('news');
Route::get('/news/{id}/{slug}', [App\Http\Controllers\ArticlesController::class, 'get'])->name('news.get');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/cart/add_item', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove', [App\Http\Controllers\CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CartController::class, 'checkoutSubmit']);
Route::get('/get-shipping-fee', [App\Http\Controllers\CartController::class, 'calShipping'])->name('shipping_fee');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback'])->name('payment.verify');

// Services
Route::group(['prefix' => 'services', 'as' => 'services.'], function() {
    Route::get('editing-feedback', [App\Http\Controllers\ServiceController::class, 'editingFeedback'])->name('editingfeedback');
    Route::post('editing-feedback', [App\Http\Controllers\ServiceController::class, 'editingFeedback']);
    Route::get('payment/callback', [App\Http\Controllers\ServiceController::class, 'handleGatewayCallback'])->name('payment.verify');
});

Auth::routes(['verify => true']);
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::post('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');

Route::group(['middleware' => ['auth:web', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [FrontendController\HomeController::class, 'index'])->name('home');
    Route::post('/book/{id}/review', [App\Http\Controllers\BookController::class, 'review'])->name('book.review');
    
    Route::get('orders', [FrontendController\OrderController::class, 'index'])->name('orders');
    Route::get('order/{id}/{code}', [FrontendController\OrderController::class, 'view'])->name('order');
    Route::post('order/book_download', [FrontendController\OrderController::class, 'downloadBook'])->name('book.download');
    Route::get('order/book-reader/{book_id}/{order_id}', [FrontendController\OrderController::class, 'readBook'])->name('book.reader');
    #Route::get('book-pdf/{book_id}', [FrontendController\OrderController::class, 'getbookPDF'])->name('book.pdf');
    
    Route::get('wishlist', [FrontendController\WishListController::class, 'index'])->name('wishlist');
    Route::post('wishlist/add-item', [FrontendController\WishListController::class, 'addItem'])->name('wishlist.add');
    Route::get('profile', [FrontendController\ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [FrontendController\ProfileController::class, 'update'])->name('profile.update');
    Route::get('settings', [FrontendController\SettingsController::class, 'index'])->name('settings');
    Route::put('settings/change_password', [FrontendController\SettingsController::class, 'passwordUpdate'])->name('settings.password.update');

    Route::get('address_book', [FrontendController\AddressBookController::class, 'index'])->name('addressBook');
    Route::get('address_book_new', [FrontendController\AddressBookController::class, 'new'])->name('addressBook.new');
    Route::post('address_book_new', [FrontendController\AddressBookController::class, 'saveNew'])->name('addressBook.new.save');
    Route::get('address_book/{id}', [FrontendController\AddressBookController::class, 'edit'])->name('addressBook.edit');
    Route::post('address_book/{id}', [FrontendController\AddressBookController::class, 'update'])->name('addressBook.update');
});

Route::get('forum', [FrontendController\ForumController::class, 'index'])->name('forum');
Route::get('forum/post/all', [FrontendController\ForumController::class, 'posts'])->name('forum.posts');
Route::post('forum/post', [FrontendController\ForumController::class, 'newPost'])->name('forum.post.new');
Route::get('forum/post/{id}/{slug}', [FrontendController\ForumController::class, 'thread'])->name('forum.post');
Route::post('forum/post/{id}/comment', [FrontendController\ForumController::class, 'comment'])->name('forum.post.comment');

Route::get('/mailable', function() {
    return new ContactForm(['firstname' => 'Joe', 'lastname' => 'Biden']);
    #return new ServiceApplication('Mark');
    #return new ApprovalStatus(1);
    #return new SendOrderConfirmation(1, 'ORD373764474');
});
