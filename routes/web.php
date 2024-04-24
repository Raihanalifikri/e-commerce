<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Cara membuat group
Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\Admin\dashboardController::class, 'index'])->name('dashboard');
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [\App\Http\Controllers\User\dashboardController::class, 'index'])->name('dashboard');
});