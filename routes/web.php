<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/shipping-returns', function () {
    return view('pages.shipping');
})->name('shipping');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('pages.terms');
})->name('terms');

use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

use App\Http\Controllers\PaymentController;
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

use App\Http\Controllers\CheckoutController;

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/place', [CheckoutController::class, 'place'])->name('checkout.place');

use App\Http\Controllers\PublicAuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [PublicAuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [PublicAuthController::class, 'login']);
    Route::get('/register', [PublicAuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [PublicAuthController::class, 'register']);
});

Route::post('/logout', [PublicAuthController::class, 'logout'])->name('logout')->middleware('auth');

use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']); // name is 'dashboard' via prefix+name? No, Route::name() on group adds prefix.
    // Actually, simpler to name explicitly to match existing usage.
    // Wait, group name('dashboard') makes it 'dashboard.' prefix.
    // So '/' becomes 'dashboard.'. I want route('dashboard').
    // Let's be explicit definition inside.
});

// Defining explicitly to avoid naming confusion
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::get('/orders/{order}', [DashboardController::class, 'showOrder'])->name('dashboard.orders.show');
});

use App\Http\Controllers\InvoiceController;
Route::middleware(['auth'])->get('/orders/{order}/invoice', [InvoiceController::class, 'download'])->name('orders.invoice');

use App\Http\Controllers\TrackingController;
Route::get('/track', [TrackingController::class, 'index'])->name('track');
Route::post('/track', [TrackingController::class, 'track'])->name('track.submit');
