<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Backsite\Admin\PublicationController as AdminPublicationController;
use App\Http\Controllers\Backsite\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backsite\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Backsite\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Backsite\Customer\TransactionController as CustomerTransactionController;
use App\Http\Controllers\Backsite\MidtransWebhookController;
use App\Http\Controllers\Backsite\PaymentController;
use App\Http\Controllers\Frontsite\HomeController;
use App\Http\Controllers\Frontsite\PublicationController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

Route::resource('/', HomeController::class);
Route::post('/', [HomeController::class, 'sendEmail'])->name('sendEmail');
Route::resource('/publication', PublicationController::class);



// Route untuk redirect ke Google
Route::get('/auth/google', [SocialAuthController::class, 'redirectToGoogle']);
// Route untuk handle callback dari Google
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // Rute redirect default
    Route::redirect('/', '/admin/dashboard', 301)->name('index');
    // dashboard
    Route::resource('dashboard', AdminDashboardController::class);
    // admin - publication
    Route::resource('/publication', AdminPublicationController::class);
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // Rute redirect default
    Route::redirect('/', '/customer/dashboard', 301)->name('index');
    // dashboard
    Route::resource('dashboard', CustomerDashboardController::class);

    // customer - cart
    Route::resource('/cart', CustomerCartController::class);
    Route::get('/cart-shipment', [CustomerCartController::class, 'showShipment'])->name('cart.shipment');

    Route::get('/payment/redirect/{snapToken}', function ($snapToken) {
        return view('payment', ['snapToken' => $snapToken]);
    })->name('payment.redirect');

    Route::resource('/transaction', CustomerTransactionController::class);
});

Route::post('midtrans/webhook', [MidtransWebhookController::class, 'handleWebhook']);
Route::post('/payment/callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');
Route::get('/payment/finish', [PaymentController::class, 'handleFinish'])->name('payment.finish');
