<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as AdminBackend;

/*
|--------------------------------------------------------------------------
| Author Routes
|--------------------------------------------------------------------------
|
| Here is where you can register author routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminBackend\HomeController::class, 'home']);

Route::group([], function(){
    Route::get('login', [AdminBackend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminBackend\Auth\LoginController::class, 'login']);
    Route::post('logout', [AdminBackend\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('password/confirm', [AdminBackend\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [AdminBackend\Auth\ConfirmPasswordController::class, 'confirm']);
    Route::get('password/reset', [AdminBackend\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AdminBackend\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AdminBackend\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AdminBackend\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('home', [AdminBackend\HomeController::class, 'index'])->name('home');

    Route::get('users', [AdminBackend\UsersController::class, 'index'])->name('users');
    Route::get('user/{id}', [AdminBackend\UsersController::class, 'get'])->name('user');
    Route::get('user/{id}/orders', [AdminBackend\UsersController::class, 'orders'])->name('user.orders');
    Route::get('user/{id}/posts', [AdminBackend\UsersController::class, 'posts'])->name('user.posts');
    Route::get('user/{id}/comments', [AdminBackend\UsersController::class, 'comments'])->name('user.comments');

    Route::get('authors', [AdminBackend\AuthorController::class, 'index'])->name('authors');
    Route::get('authors/pending_approval', [AdminBackend\AuthorController::class, 'pending'])->name('authors.pending');
    Route::get('author/{id}', [AdminBackend\AuthorController::class, 'get'])->name('author');
    Route::post('author/{id}/approval', [AdminBackend\AuthorController::class, 'approval'])->name('author.approval');
    Route::get('author/{id}/books', [AdminBackend\AuthorController::class, 'books'])->name('author.books');
    Route::get('author/{id}/sales', [AdminBackend\AuthorController::class, 'sales'])->name('author.sales');
    Route::get('author/{id}/payouts', [AdminBackend\AuthorController::class, 'payouts'])->name('author.payouts');

    Route::get('books', [AdminBackend\BookController::class, 'index'])->name('books');
    Route::get('book/{id}', [AdminBackend\BookController::class, 'get'])->name('book');
    Route::get('book_new', [AdminBackend\BookController::class, 'new'])->name('book.new');
    Route::post('book_new', [AdminBackend\BookController::class, 'addNew']);
    Route::get('book/{id}/edit', [AdminBackend\BookController::class, 'edit'])->name('book.edit');
    Route::post('book/{id}/update', [AdminBackend\BookController::class, 'update'])->name('book.update');
    Route::post('book/{id}/delete', [AdminBackend\BookController::class, 'delete'])->name('book.delete');
    Route::get('book_download/{book_file}', [AdminBackend\BookController::class, 'download'])->name('book.download');

    Route::get('orders', [AdminBackend\OrdersController::class, 'index'])->name('orders');
    Route::get('order/{id}', [AdminBackend\OrdersController::class, 'get'])->name('order');

    Route::get('articles', [AdminBackend\ArticlesController::class, 'index'])->name('articles');
    Route::get('article/{id}', [AdminBackend\ArticlesController::class, 'get'])->name('article');
    Route::get('article_new', [AdminBackend\ArticlesController::class, 'new'])->name('article.new');
    Route::post('article_new', [AdminBackend\ArticlesController::class, 'addNew']);
    Route::get('article/{id}/edit', [AdminBackend\ArticlesController::class, 'edit'])->name('article.edit');
    Route::post('article/{id}/update', [AdminBackend\ArticlesController::class, 'update'])->name('article.update');
    Route::get('article/{id}/delete', [AdminBackend\ArticlesController::class, 'delete'])->name('article.delete');

    Route::get('account/profile', [AdminBackend\ProfileController::class, 'index'])->name('profile');
    Route::put('account/profile/update', [AdminBackend\ProfileController::class, 'update'])->name('profile.update');
    Route::get('account/password', [AdminBackend\ProfileController::class, 'password'])->name('profile.password');
    Route::put('account/password', [AdminBackend\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::get('settings', [AdminBackend\SettingsController::class, 'index'])->name('settings');
});