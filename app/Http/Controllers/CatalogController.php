<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    // app/Http/Controllers/CatalogController.php
public function show(\App\Models\City $city, string $slug, Request $request)
{
    session(['city_id' => $city->id]);

    $catalog = \App\Models\Catalog::where('slug', $slug)->firstOrFail();
    $categories = $catalog->categories;
    $categoryIds = $categories->pluck('id');

    // Если нет категорий — нет товаров
    if ($categoryIds->isEmpty()) {
        $products = collect();
        $allBrands = collect();
        $allCountries = collect();
    } else {
        // Основной запрос
        $query = \App\Models\Product::with([
            'brand.country',
            'category',
            'stocks' => fn($q) => $q->whereHas('branch', fn($b) => $b->where('city_id', $city->id))
        ])->whereIn('category_id', $categoryIds);

        // === ФИЛЬТР: категории ===
        if ($request->filled('categories')) {
            $query->whereIn('category_id', $request->categories);
        }

        // === ФИЛЬТР: бренды ===
        if ($request->filled('brands')) {
            $query->whereIn('brand_id', $request->brands);
        }

        // === ФИЛЬТР: страна ===
        if ($request->filled('countries')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->whereIn('country_id', $request->countries);
            });
        }

        // === ФИЛЬТР: наличие ===
        if ($request->has('availability') && $request->availability === 'in-stock') {
            $query->whereHas('stocks', function ($q) use ($city) {
                $q->where('quantity', '>', 0)
                  ->whereHas('branch', fn($b) => $b->where('city_id', $city->id));
            });
        }

        // === ФИЛЬТР: цена ===
        if ($request->filled('price_min') || $request->filled('price_max')) {
            $query->whereHas('stocks', function ($q) use ($request, $city) {
                $q->whereHas('branch', fn($b) => $b->where('city_id', $city->id));
                if ($request->filled('price_min')) {
                    $q->where('price', '>=', (float) $request->price_min);
                }
                if ($request->filled('price_max')) {
                    $q->where('price', '<=', (float) $request->price_max);
                }
            });
        }

        // Получаем товары
        $products = $query->get();

        // Обогащаем
        $products->each(function ($product) {
            $stock = $product->stocks->firstWhere('quantity', '>', 0);
            $product->is_available = $stock !== null;
            $product->display_price = $stock?->price ?? 0;
            $product->display_discount = $stock?->discount ?? 0;
        });

        // Сортировка в PHP (просто и надёжно)
        $sort = $request->get('sort', 'name');
        if ($sort === 'price_asc') {
            $products = $products->sortBy('display_price');
        } elseif ($sort === 'price_desc') {
            $products = $products->sortByDesc('display_price');
        }
        $products = $products->values();

        // Данные для фильтров (все возможные)
        $allBrands = $products->pluck('brand')->filter()->unique('id')->values();
        $countryIds = $products->pluck('brand.country_id')->unique()->filter();
        $allCountries = \App\Models\Country::find($countryIds);
    }

    return view('catalog.show', compact(
        'catalog',
        'categories',
        'products',
        'allBrands',
        'allCountries',
        'city'
    ));
}
}
