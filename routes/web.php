<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PemesananController;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboardAdmin');
    Route::get('/admin/user', [UserController::class, 'index'])->name('user');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Hapus Produk

    // Produk Management
    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('produk.create'); // Tambah Produk
    Route::post('/admin/produk', [ProdukController::class, 'store'])->name('produk.store'); // Simpan Produk
    Route::get('/admin/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // Edit Produk
    Route::put('/admin/produk/{id}', [ProdukController::class, 'update'])->name('produk.update'); // Update Produk
    Route::delete('/admin/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy'); // Hapus Produk
    // Route::get('/customer/produk', [ProdukController::class, 'indexCustomer'])->name('produk.customer');
    // Route::get('/', [CustomerController::class,'index']);
    Route::put('/pemesanan/{id}/update-status', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');
});
Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/produk', [ProdukController::class, 'indexCustomer'])->name('produk.customer');
    Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
    // Route::post('/cart/update/{id_keranjang}/{action}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::put('/cart/update/{id_keranjang}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    //Pemesanan
    Route::get('/customer/pemesanan', [PemesananController::class, 'index'])->name('checkout.show');
    Route::post('/customer/checkout', [PemesananController::class, 'checkout'])->name('checkout.add');
    Route::post('/pemesanan/{id_pemesanan}/upload', [PemesananController::class, 'uploadBuktiPembayaran'])->name('pemesanan.upload');

});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
require __DIR__ . '/auth.php';
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'rolemanager::customer'])->name('dashboard');
// Route::get('/admin/dashboard', function () {
//     return view('admin');
// })->middleware(['auth', 'verified', 'rolemanager::admin'])->name('admin');