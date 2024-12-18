<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('dashboardAdmin');
    Route::get('/admin/user', [UserController::class,'index'])->name('user');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('users.update');


    // Route::get('/', [CustomerController::class,'index']);
});
Route::middleware(['auth', 'role:customer'])->group(function () {
    // Route::get('/', [CustomerController::class,'index']);
    
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