<?php

use App\Http\Controllers\cart;
use App\Http\Controllers\shop;
use App\Http\Controllers\admin;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', function () {
    return view('welcome');
});
//authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Admin Routes
Route::get('admin', [Admin::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('admin/dashboard',[Admin::class,'dashboard'])->name('admin.dashboard')->middleware('auth');
// Cart Routes
Route::get('cart', [cart::class, 'index'])->name('cart.index');

// Shop Routes
Route::get('shop', [shop::class, 'index'])->name('shop.index');

// for crud
// CRUD Routes for Products
Route::get('admin/products/create', [admin::class, 'createProduct'])->name('admin.create')->middleware('auth');
Route::post('admin/products', [admin::class, 'storeProduct'])->name('admin.store')->middleware('auth');
Route::get('admin/products/{id}/edit', [admin::class, 'editProduct'])->name('admin.edit')->middleware('auth');
Route::put('admin/products/{product}', [Admin::class, 'updateProduct'])->name('admin.update{id}');

Route::delete('admin/products/{id}', [admin::class, 'deleteProduct'])->name('admin.delete')->middleware('auth');