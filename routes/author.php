<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Author as AuthorBackend;

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

Route::get('/', [AuthorBackend\HomeController::class, 'home']);

Route::group([], function(){
    Route::get('register', [AuthorBackend\Auth\RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthorBackend\Auth\RegisterController::class, 'register']);
    Route::get('login', [AuthorBackend\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthorBackend\Auth\LoginController::class, 'login']);
    Route::post('logout', [AuthorBackend\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('password/confirm', [AuthorBackend\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [AuthorBackend\Auth\ConfirmPasswordController::class, 'confirm']);
    Route::get('password/reset', [AuthorBackend\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AuthorBackend\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AuthorBackend\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AuthorBackend\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth:author']], function () {
    Route::get('home', [AuthorBackend\HomeController::class, 'index'])->name('home');
    Route::post('request_approval', [AuthorBackend\HomeController::class, 'requestApproval'])->name('approval');

    Route::get('books', [AuthorBackend\BookController::class, 'index'])->name('books');
    Route::get('book/{id}', [AuthorBackend\BookController::class, 'get'])->name('book');
    Route::get('book_new', [AuthorBackend\BookController::class, 'new'])->name('book.new');
    Route::post('book_new', [AuthorBackend\BookController::class, 'addNew']);
    Route::get('book/{id}/edit', [AuthorBackend\BookController::class, 'edit'])->name('book.edit');
    Route::post('book/{id}/update', [AuthorBackend\BookController::class, 'update'])->name('book.update');
    Route::post('book/{id}/delete', [AuthorBackend\BookController::class, 'delete'])->name('book.delete');
    Route::get('book_download/{book_file}', [AuthorBackend\BookController::class, 'download'])->name('book.download');

    Route::get('orders', [AuthorBackend\OrdersController::class, 'index'])->name('orders');
    Route::get('order/{id}', [AuthorBackend\OrdersController::class, 'get'])->name('order');

    Route::get('revenue/earnings', [AuthorBackend\RevenueController::class, 'earnings'])->name('earnings');
    Route::get('revenue/earning/{id}', [AuthorBackend\RevenueController::class, 'earnings'])->name('earning');
    Route::get('revenue/payouts', [AuthorBackend\RevenueController::class, 'payouts'])->name('payouts');
    Route::post('revenue/payout_request', [AuthorBackend\RevenueController::class, 'payoutNew'])->name('payout.new');
    Route::get('revenue/payout/{id}', [AuthorBackend\RevenueController::class, 'payout'])->name('payout');
    Route::post('revenue/payout/{id}/trash', [AuthorBackend\RevenueController::class, 'payoutTrash'])->name('payout.trash');

    Route::get('account/profile', [AuthorBackend\ProfileController::class, 'index'])->name('profile');
    Route::put('account/profile/update', [AuthorBackend\ProfileController::class, 'update'])->name('profile.update');
    Route::post('author/profile/update/image', [AuthorBackend\ProfileController::class, 'updateImage'])->name('profile.update.image');
    Route::post('account/profile/update/parent', [AuthorBackend\ProfileController::class, 'updateParent'])->name('profile.update.parent');
    Route::get('account/password', [AuthorBackend\ProfileController::class, 'password'])->name('profile.password');
    Route::put('account/password', [AuthorBackend\ProfileController::class, 'passwordUpdate'])->name('profile.password.update');
    Route::get('settings', [AuthorBackend\SettingsController::class, 'index'])->name('settings');
});