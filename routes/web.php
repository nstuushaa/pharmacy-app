<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DeliveryPageController;
use App\Http\Controllers\HomeController;

//Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
Route::get('/catalog/{slug}', [CatalogController::class, 'show'])->name('catalog.show');
Route::get('/delivery-info', [DeliveryPageController::class, 'index'])->name('delivery-info');

