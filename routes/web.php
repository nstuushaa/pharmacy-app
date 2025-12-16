<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Support\Facades\Route;

//Главная страница
Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
