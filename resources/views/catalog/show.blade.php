{{-- resources/views/catalog/show.blade.php --}}
@extends('layouts.app')

@section('title', $catalog->name)

@section('content')
<style>
        body { background: #f8f9fa; }
        .sidebar {
            background: #fff;
            min-height: 100vh;
            padding: 2rem;
            border-right: 1px solid #eee;
            position: sticky;
            top: 0;
        }
        /* ... остальные стили из вашего <style> ... */
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .category-list li {
            padding: 8px 0;
            color: #666;
            cursor: pointer;
            transition: color 0.2s;
        }
        .category-list li:hover {
            color: #000;
        }
        .btn-show-all {
            background: #2FD3AE;
            color: white;
            border: none;
            width: 100%;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-show-all:hover {
            background: #28b89a;
        }
        .form-check-input:checked {
            background-color: #2FD3AE;
            border-color: #2FD3AE;
        }
        .btn-apply {
            background: #2FD3AE;
            color: white;
            border: none;
        }
        .btn-reset {
            background: transparent;
            color: #666;
            border: 1px solid #ddd;
        }
        .product-card {
            transition: box-shadow 0.3s;
            border: none !important;
        }
        .product-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        }
        .btn-add {
            background: #2FD3AE;
            color: white;
            border: none;
        }
        .btn-add:hover {
            background: #28b89a;
        }
        .rating { color: #ffc107; }
    </style>
<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-lg-9  p-4">
            <h2 class="mb-4 fw-bold">{{ $catalog->name }}</h2>
        </div>
    </div>

    <div class="row g-0">
        <!-- Левая боковая панель -->
        <div class="col-lg-3 sidebar">
            <form method="GET" id="filter-form">
                <h5 class="mb-4 fw-bold">КАТЕГОРИИ</h5>
                <ul class="category-list mb-4">
                    @foreach($categories as $category)
                        <li>
                            <label>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                    {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}>
                                {{ $category->name }}
                            </label>
                        </li>
                    @endforeach
                </ul>

                <button type="button" class="btn btn-show-all mb-5" onclick="alert('Показать все')">
                    Показать все категории
                </button>

                <h5 class="mb-4 fw-bold">ФИЛЬТР</h5>

                <!-- Цена -->
                <div class="mb-4">
                    <h6 class="mb-3">Цена</h6>
                    <div class>
                        <input type="number" name="price_min" class="form-control form-control-sm" 
                               value="{{ request('price_min', 0) }}" id="price-min">
                        <input type="number" name="price_max" class="form-control form-control-sm" 
                               value="{{ request('price_max', 100000) }}" id="price-max">
                    </div>
                    <input type="range" class="form-range" id="price-range-min" 
                           min="0" max="100000" value="{{ request('price_min', 0) }}">
                    <input type="range" class="form-range" id="price-range-max" 
                           min="0" max="100000" value="{{ request('price_max', 100000) }}">
                </div>

                <!-- Страна -->
                <div class="mb-4">
                    <h6 class="mb-3">Страна</h6>
                    @foreach($allCountries as $country)
                        @if($country)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" 
                                       name="countries[]" value="{{ $country->id }}"
                                       id="country-{{ $country->id }}"
                                       {{ in_array($country->id, request('countries', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="country-{{ $country->id }}">
                                    {{ $country->name }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Наличие -->
                <div class="mb-5">
                    <h6 class="mb-3">Наличие</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="availability" value="in-stock"
                               id="in-stock" {{ request('availability', 'in-stock') === 'in-stock' ? 'checked' : '' }}>
                        <label class="form-check-label" for="in-stock">В наличии</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="availability" value="on-order"
                               id="on-order" {{ request('availability') === 'on-order' ? 'checked' : '' }}>
                        <label class="form-check-label" for="on-order">Под заказ</label>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-apply py-2">Показать</button>
                    <a href="{{ url()->current() }}" class="btn btn-reset py-2">Сбросить</a>
                </div>
            </form>
        </div>

        <!-- Основной контент -->
        <div class="col-lg-9 p-4 bg-white">
            <!-- Популярные бренды -->
            @if($allBrands->isNotEmpty())
            <div class="mb-4">
                <h5 class="mb-3">Популярные бренды</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($allBrands as $brand)
                        <button class="btn btn-outline-secondary">{{ $brand->name }}</button>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Сортировка -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span>Сортировать:</span>
                <select class="form-select w-auto" onchange="this.form.submit()" form="filter-form" name="sort">
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>По названию</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>По цене ↑</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>По цене ↓</option>
                </select>
            </div>

            <!-- Сетка товаров -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @forelse($products as $product)
                    <div class="col">
                        <div class="card product-card h-100 shadow-sm">
                            <img src="{{ $product->primaryImage ? $product->primaryImage->image_url : asset('assets/img/default.svg') }}"
                                alt="{{ $product->name }}"
                                class="img-fluid mb-3 mx-auto d-block"
                                style="height: 120px; object-fit: contain;">
                            <div class="card-body d-flex flex-column">
                                <div class="rating mb-2 fs-5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        {{ $i <= round($product->rating) ? '★' : '☆' }}
                                    @endfor
                                </div>
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="text-muted small">{{ $product->category?->name }}</p>
                                <ul class="small text-muted list-unstyled">
                                    <li>Бренд: {{ $product->brand?->name ?? '–' }}</li>
                                    <li>Количество в упаковке: {{ $product->package_qty }} шт</li>
                                    <li>Код товара: {{ $product->code }}</li>
                                </ul>
                                <div class="mt-auto">
                                    @if($product->is_available)
                                        <p class="fw-bold fs-4 text-danger mb-2">
                                            {{ number_format($product->display_price, 0, ',', ' ') }} ₽
                                        </p>
                                        <button class="btn btn-add w-100">
                                            <i class="fas fa-cart-plus me-2"></i>В корзину
                                        </button>
                                    @else
                                        <p class="text-muted">Нет в наличии</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Товары не найдены.</p>
                @endforelse
            </div>

            <!-- Пагинация (если будете использовать) -->
            {{-- {{ $products->appends(request()->query())->links() }} --}}
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Синхронизация цены
    const priceMin = document.getElementById('price-min');
    const priceMax = document.getElementById('price-max');
    const rangeMin = document.getElementById('price-range-min');
    const rangeMax = document.getElementById('price-range-max');

    if (priceMin && rangeMin) {
        priceMin.addEventListener('input', () => rangeMin.value = priceMin.value);
        rangeMin.addEventListener('input', () => priceMin.value = rangeMin.value);
    }
    if (priceMax && rangeMax) {
        priceMax.addEventListener('input', () => rangeMax.value = priceMax.value);
        rangeMax.addEventListener('input', () => priceMax.value = rangeMax.value);
    }
</script>
@endpush
@endsection