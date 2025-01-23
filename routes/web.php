<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);  // Redirect alternatif ke home
Route::get('/product/{product}', [HomeController::class, 'showProduct'])->name('product.show');
Route::get('/product/{product}/make-order', [HomeController::class, 'makeOrder'])->name('product.make-order');
Route::post('/product/{product}/checkout', [HomeController::class, 'checkout'])->name('product.checkout');
Route::get('/transaction/{transaction}/complete-payment', [HomeController::class, 'completePayment'])->name('transaction.completePayment');
Route::get('/transaction/{transaction}/payment', [HomeController::class, 'payment'])->name('transaction.payment');
Route::post('/transaction/{transaction}/send-payment-proof', [HomeController::class, 'sendPaymentProof'])->name('transaction.sendPaymentProof');

// Authentication Routes - Dikelompokkan untuk kejelasan
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Register Routes - Tidak perlu didefinisikan dua kali
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

// Logout Route - Harus dapat diakses oleh authenticated users
Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Public Information Routes
Route::get('/regulation', function () {
    return view('regulation.regulation');
})->name('regulation');

// Route untuk regulasi per negara
$countries = [
    'filipina',
    'thailand',
    'vietnam',
    'myanmar',
    'singapura',
    'malaysia',
    'laos',
    'kamboja',
    'brunei',
    'timorleste'
];

foreach ($countries as $country) {
    Route::get("/regulation/countries/{$country}", function () use ($country) {
        return view("regulation.countries.{$country}");
    })->name("regulation.countries.{$country}");
}

// Commodity Route
Route::get('/commodity', function () {
    return view('commodity');
})->name('commodity');

// Seller Routes - Dengan middleware auth dan checkseller
Route::middleware(['auth', 'checkseller'])->group(function () {
    // Complete profile routes
    Route::get('/seller/complete-profile', [SellerController::class, 'showProfileForm'])
        ->name('seller.complete-profile');
    Route::post('/seller/complete-profile', [SellerController::class, 'completeProfile'])
        ->name('seller.complete-profile.save');

    // Profile route
    Route::get('/seller/profile', [SellerController::class, 'profile'])
        ->name('profile.show');

    // Store route
    Route::get('/seller/store', [SellerController::class, 'store'])
        ->name('seller.store');

    // Product routes grouped together
    Route::prefix('seller/products')->name('seller.products.')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::get('/transaction/{transaction}/accept-payment', [TransaksiController::class, 'acceptPayment'])->name('transaction.acceptPayment');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/transaction', [TransaksiController::class, 'index'])->name('transaction');
});
