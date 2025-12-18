@extends('layouts.app')

@section('title', 'Аптека онлайн')

@section('content')
    <div class="container">
        <h1>Главная страница</h1>

        <div class="row g-4">
            {{-- Левый баннер --}}
            @if($leftBanner)
            <div class="col-12 col-lg-6">
                <div class="banner-left rounded-4 overflow-hidden position-relative text-white" 
                    style="background: {{ $leftBanner->background_color ?? 'linear-gradient(135deg, #27AE60, #2F80ED)' }}; min-height: 480px;">
                    
                    <div class="position-relative z-2 p-5 p-lg-6" style="max-width: 55%;">
                        <h2 class="fw-bold mb-3" style="font-size: 40px; line-height: 1.1;">
                            {!! nl2br(e($leftBanner->title)) !!}
                            @if($leftBanner->subtitle)
                                <span style="font-weight: 300; font-size: 30px;">{{ $leftBanner->subtitle }}</span>
                            @endif
                        </h2>
                        @if($leftBanner->description)
                            <p class="lead mb-4" style="font-size: 16px; line-height: 1.5;">
                                {{ $leftBanner->description }}
                            </p>
                        @endif
                        <a href="{{ $leftBanner->button_url }}" class="btn rounded-pill px-3 py-3 fw-semibold text-white shadow" 
                            style="background: #27AE60; font-size: 14px; display: inline-flex; align-items: center; gap: 8px;">
                            {{ $leftBanner->button_text }}
                            <img src="{{ asset('asset/img/Arrow_right.svg') }}" alt="" width="20">
                        </a>
                    </div>

                    <img src="{{ asset('asset/img/' . $leftBanner->image) }}" 
                        alt="{{ $leftBanner->title }}" 
                        class="position-absolute bottom-0 end-0" 
                        style="height: 92%; object-fit: contain; max-width: 55%; pointer-events: none;">
                </div>
            </div>
            @endif

            {{-- Правый баннер --}}
            @if($rightBanner)
            <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
                <div class="banner-right rounded-4 overflow-hidden position-relative text-white w-100 text-center"
                    style="background: {{ $rightBanner->background_color ?? '#FC647D' }}; max-height: 420px; max-width: 350px; padding: 30px;">

                    @if($rightBanner->subtitle)
                        <h3 class="fw-normal mb-2" style="font-size: 22px; opacity: 0.95;">
                            {{ $rightBanner->subtitle }}
                        </h3>
                    @endif

                    @if($rightBanner->title)
                        <h1 class="fw-bold mb-4" style="font-size: 48px; line-height: 1;">
                            {{ $rightBanner->title }}
                        </h1>
                    @endif

                    @if($rightBanner->image)
                        <img src="{{ asset('asset/img/' . $rightBanner->image) }}"
                            alt="{{ $rightBanner->title }}"
                            class="mx-auto mb-4"
                            style="max-height: 55%; object-fit: contain;">
                    @endif

                    <a href="{{ $rightBanner->button_url }}"
                        class="btn rounded-pill px-3 py-3 fw-bold text-white shadow-lg d-inline-flex align-items-center gap-2"
                        style="background: #E74C38; margin-top: -200px;">
                        {{ $rightBanner->button_text }}
                        <img src="{{ asset('asset/img/Arrow_right.svg') }}" alt="→" width="20">
                    </a>
                </div>
            </div>
            @endif
        </div>
        <!-- Блок преимуществ — иконки слева от текста -->
      <div class="advantages-block my-5 py-5 border-top border-bottom bg-white">
        <div class="row g-4 g-xl-5 justify-content-center">

          <!-- 1. Ассортимент -->
          <div class="col-12 col-md-6 col-lg">
            <div class="d-flex align-items-center gap-4">
              <img src="{{ asset('asset/img/shipping.svg') }}" alt="" width="56" height="56" class="flex-shrink-0">
              <div>
                <h6 class="fw-bold mb-1">Ассортимент</h6>
                <p class="small text-muted mb-0">Оборудование, мебель, посуда и инвентарь</p>
              </div>
            </div>
          </div>

          <!-- 2. Быстрая доставка -->
          <div class="col-12 col-md-6 col-lg">
            <div class="d-flex align-items-center gap-4">
              <img src="{{ asset('asset/img/online.svg') }}" alt="" width="56" height="56" class="flex-shrink-0">
              <div>
                <h6 class="fw-bold mb-1">Быстрая доставка</h6>
                <p class="small text-muted mb-0">В любую точку России быстро</p>
              </div>
            </div>
          </div>

          <!-- 3. Гарантия -->
          <div class="col-12 col-md-6 col-lg">
            <div class="d-flex align-items-center gap-4">
              <img src="{{ asset('asset/img/ui.svg') }}" alt="" width="56" height="56" class="flex-shrink-0">
              <div>
                <h6 class="fw-bold mb-1">Гарантия</h6>
                <p class="small text-muted mb-0">Вся продукция сертифицирована</p>
              </div>
            </div>
          </div>

          <!-- 4. Низкие цены -->
          <div class="col-12 col-md-6 col-lg">
            <div class="d-flex align-items-center gap-4">
              <img src="{{ asset('asset/img/saved.svg') }}" alt="" width="56" height="56" class="flex-shrink-0">
              <div>
                <h6 class="fw-bold mb-1">Низкие цены</h6>
                <p class="small text-muted mb-0">Мы стараемся держать самые низкие цены</p>
              </div>
            </div>
          </div>

          <!-- 5. Отзывы -->
          <div class="col-12 col-md-6 col-lg">
            <div class="d-flex align-items-center gap-4">
              <img src="{{ asset('asset/img/positive-review 1.svg') }}" alt="" width="56" height="56" class="flex-shrink-0">
              <div>
                <h6 class="fw-bold mb-1">4349 отзывов</h6>
                <p class="small text-muted mb-0">Мы стараемся держать самые низкие цены</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
@endsection