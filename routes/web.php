<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/detail-product/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailCategory'])->name('detail.category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/cart', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'addToCart'])->name('cart.add');
});

// Cara membuat group
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('dashboard');
    Route::resource('/category', CategoryController::class)->except(['show','edit','create']);
    Route::resource('/product', ProductController::class);
    Route::resource('/product.gallery', ProductGalleryController::class)->except(['show', 'create', 'update', 'edit']);
    Route::resource('/userList', UserController::class);
    Route::resource('/transection', TransactionController::class);
    Route::resource('/my-transection', MyTransactionController::class)->only(['index', 'show']);
    Route::get('/changePassword', [\App\Http\Controllers\profile\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::put('/updatePassword', [\App\Http\Controllers\profile\ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\dashboardController::class, 'index'])->name('dashboard');
    Route::resource('/my-transection', MyTransactionController::class)->only(['index', 'show']);
    Route::get('/changePassword', [\App\Http\Controllers\profile\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::put('/updatePassword', [\App\Http\Controllers\profile\ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});


Route::middleware('auth')->group(function(){
    Route::get('/profile', [\App\Http\Controllers\profile\ProfileController::class, 'index'])->name('profile.index');
});