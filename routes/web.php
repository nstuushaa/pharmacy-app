<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Глобальные маршруты (без города)
|--------------------------------------------------------------------------
*/

// Главная — перенаправляет на первый город
Route::get('/', function () {
    $city = \App\Models\City::first();
    return redirect('/' . $city->slug);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Маршруты внутри города: /{city}/...
|--------------------------------------------------------------------------
*/
Route::prefix('{city:slug}')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');
    Route::get('/catalog/{slug}', [CatalogController::class, 'show'])->name('catalog.show');
});