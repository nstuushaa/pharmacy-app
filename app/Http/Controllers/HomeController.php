<?php

namespace App\Http\Controllers;

use App\Models\PromoBlock;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Баннеры (оставляем как есть)
        $leftBanner = PromoBlock::where('slug', 'main-left')->first();
        $rightBanner = PromoBlock::where('slug', 'main-right')->first();

        // === НОВОЕ: Акция месяца ===
        $cityId = session('city_id', 1); // или City::first()?->id

        // Получаем товары для акции (например, is_hit = true)
        $promoProducts = Product::with([
            'brand',
            'stocks' => fn($query) => $query->whereHas('branch', fn($b) => $b->where('city_id', $cityId))
        ])
        ->where('is_deal_of_day', true)
        ->limit(8)
        ->get();

        // Обогащаем каждый товар данными для отображения
        $promoProducts->each(function ($product) {
            $availableStock = $product->stocks->firstWhere('quantity', '>', 0);
            
            $product->is_available = $availableStock !== null;
            $product->display_price = $availableStock?->price ?? 0;
            $product->display_discount = $availableStock?->discount ?? 0;
            $product->discounted_price = $availableStock 
                ? $availableStock->price * (1 - $availableStock->discount / 100)
                : 0;
        });

        return view('home', compact(
            'leftBanner', 
            'rightBanner', 
            'promoProducts' // ← передаём акционные товары
        ));
    }
}