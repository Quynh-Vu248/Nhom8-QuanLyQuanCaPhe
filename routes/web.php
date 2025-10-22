<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\AuthProductController as UserProductController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;

// Trang chính
Route::get('/', function () {
    return view('welcome');
});

// Dashboard — chuyển hướng tùy theo role
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect('/admin/products');
    }

    $products = \App\Models\Product::latest()->get();
    return view('dashboard', ['products' => $products]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Hồ sơ người dùng
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Route cho admin (chỉ admin mới truy cập được)
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('products/{product}', [AdminProductController::class, 'show'])->name('admin.products.show');
    Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

// ✅ Route cho user thường (AuthProductController)
Route::middleware(['auth'])->prefix('auth')->group(function () {
    Route::get('products', [UserProductController::class, 'index'])->name('auth.products.index');
    Route::get('products/create', [UserProductController::class, 'create'])->name('auth.products.create');
    Route::post('products', [UserProductController::class, 'store'])->name('auth.products.store');
    Route::get('products/{product}', [UserProductController::class, 'show'])->name('auth.products.show');
    Route::get('products/{product}/edit', [UserProductController::class, 'edit'])->name('auth.products.edit');
    Route::put('products/{product}', [UserProductController::class, 'update'])->name('auth.products.update');
    Route::delete('products/{product}', [UserProductController::class, 'destroy'])->name('auth.products.destroy');
});

// Auth routes mặc định
require __DIR__ . '/auth.php';

// Đặt hàng (Order)
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{product}', [OrderController::class, 'store'])->name('orders.store');
});
