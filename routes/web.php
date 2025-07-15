<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Di sinilah semua rute web aplikasi Anda didefinisikan.
| File ini dimuat oleh RouteServiceProvider dan semua rute
| secara otomatis menggunakan middleware "web".
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman Keranjang
Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

// Halaman Checkout (tampilan form)
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Proses Checkout (submit form)
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Halaman Login (tampilan form)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman Register (tampilan form)
Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');

// Proses Register
Route::post('/register', [AuthController::class, 'store'])->name('register');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');

Route::post('/keranjang/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/checkout-success', function() {
  return view('checkout-success');
})->name('checkout.success');


Route::post('/keranjang/hapus/{id}', [CartController::class, 'remove'])->name('cart.remove');



Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');



