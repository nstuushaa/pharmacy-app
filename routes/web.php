<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Роут выбора города (если зайти на /moskva напрямую)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $city = \App\Models\City::first();
    return redirect('/' . $city->slug);
});


/*
|--------------------------------------------------------------------------
| Все маршруты ВНУТРИ города
|--------------------------------------------------------------------------
*/
Route::prefix('{city:slug}')
    ->group(function () {

        // Главная
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Корзина
        Route::get('/cart', [CartController::class, 'index'])->name('cart');

        // Профиль
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

        // Избранное
        Route::get('/favourite', [FavouriteController::class, 'index'])->name('favourite');

        // Каталог
        Route::get('/catalog/{slug}', [CatalogController::class, 'show'])
            ->name('catalog.show');
    });
