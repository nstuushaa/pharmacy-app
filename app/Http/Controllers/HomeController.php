<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Partner;
use App\Models\PromoBlock;
use App\Models\Product;
use App\Models\ReviewPharmacy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(City $city) // ✅ Принимаем $city из маршрута
    {
        // Устанавливаем ID города в сессию
        session(['city_id' => $city->id]);

        // Баннеры (оставляем как есть)
        $leftBanner = PromoBlock::where('slug', 'main-left')->first();
        $rightBanner = PromoBlock::where('slug', 'main-right')->first();

        // === НОВОЕ: Акция месяца ===
        $cityId = session('city_id', 1); // теперь будет правильный ID

        // Получаем товары для акции (например, is_hit = true)
        $promoProducts = Product::with([
            'brand',
            'primaryImage',
            'stocks' => fn($query) => $query->whereHas('branch', fn($b) => $b->where('city_id', $cityId))
        ])
        ->where('is_deal_of_day', true)
        ->limit(8)
        ->get();

        $promoProducts->each(function ($product) use ($cityId) {
            $availableStock = $product->stocks
                ->firstWhere(fn($stock) => $stock->branch->city_id == $cityId && $stock->quantity > 0);
            
            $product->is_available = $availableStock !== null;
            $product->display_price = $availableStock?->price ?? 0;
            $product->display_discount = $availableStock?->discount ?? 0;
            $product->discounted_price = $availableStock 
                ? $availableStock->price * (1 - $availableStock->discount / 100)
                : 0;
        });

        $approvedReviews = ReviewPharmacy::approved()
        ->latest()
        ->limit(3)
        ->get();

        $averageRating = ReviewPharmacy::approved()->avg('rating') ?: 0;
        $totalReviews = ReviewPharmacy::approved()->count();

        $partners = Partner::all();

        $cities = City::all(); // не забудьте получить список городов

        return view('home', compact(
            'city', // ← добавьте это, чтобы использовать в header.blade.php
            'cities',
            'leftBanner', 
            'rightBanner', 
            'promoProducts',
            'approvedReviews',  
            'averageRating',    
            'totalReviews',
            'partners'
        ));
    }
}