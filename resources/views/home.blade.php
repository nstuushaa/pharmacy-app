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
      <section class="promotions-section py-3 mb-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="fw-bold mb-0">Акция месяца</h2>
            <div class="d-flex gap-3">
                <button class="btn rounded-circle prev-slide" style="width: 40px; height: 40px; background-color: #00bfa5;">
                    <i class="fas fa-chevron-left" style="color: white;"></i>
                </button>
                <button class="btn rounded-circle next-slide" style="width: 40px; height: 40px; background-color: #00bfa5;">
                    <i class="fas fa-chevron-right" style="color: white;"></i>
                </button>
            </div>
        </div>

        <div class="promotions-slider">
            <div class="row g-4">
                @foreach($promoProducts as $product)
                <div class="col-6 col-md-4 col-lg-3 col-xl-2-4">
                    <div class="card product-card border-0 shadow-sm">
                        <div class="card-body p-3">
                            @if($product->is_deal_of_day)
                                <span class="badge text-white position-absolute top-0 start-0 m-2" style="background-color: #00bfa5;">Товар дня</span>
                            @endif

                            <img src="{{ $product->primaryImage ? $product->primaryImage->image_url : asset('assets/img/default.svg') }}"
                                alt="{{ $product->name }}"
                                class="img-fluid mb-3 mx-auto d-block"
                                style="height: 120px; object-fit: contain;">

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                @if($product->is_available)
                                    <div class="small" style="color: #00bfa5; font-weight: bold;">Есть в наличии</div>
                                @else
                                    <div class="small text-danger" style="font-weight: bold;">Нет в наличии</div>
                                @endif

                                <div class="text-warning small">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= round($product->rating))
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </div>
                            </div>

                            <h6 class="card-title mb-3 text-start">{{ $product->name }}</h6>

                            <ul class="list-unstyled small text-muted mb-3 text-start">
                                <li>• Бренд: {{ $product->brand->name ?? '–' }}</li>
                                <li>• Количество в упаковке: {{ $product->package_qty }} шт</li>
                                <li>• Код товара: {{ $product->code }}</li>
                            </ul>

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="text-start">
                                    @if($product->display_discount > 0)
                                        <div class="fw-bold fs-5">{{ number_format($product->discounted_price, 0, ',', ' ') }} ₽</div>
                                        <del class="fw-bold small" style="color: #E74C38;">
                                            {{ number_format($product->display_price, 0, ',', ' ') }} ₽
                                        </del>
                                    @else
                                        <div class="fw-bold fs-5">{{ number_format($product->display_price, 0, ',', ' ') }} ₽</div>
                                    @endif
                                </div>
                                <button class="btn btn-success rounded-circle p-3 shadow flex-shrink-0">
                                    <i class="fas fa-shopping-cart text-white"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="how-we-work py-5 border-top border-bottom">
    <div class="container">
      <h2 class="fw-bold mb-5">Как мы работаем?</h2>
      
      <div class="row g-4 g-xl-5 justify-content-center">
        
        <!-- Шаг 1 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="d-flex align-items-start gap-4">
            <div class="step-icon flex-shrink-0">
              <img src="{{ asset('asset/img/checklist 1.svg') }}" alt="" width="56" height="56">
            </div>
            <div>
              <div class="step-number fw-bold mb-2" style="color: #FF7A00;">1</div>
              <h5 class="fw-bold mb-2">Выберите товар</h5>
              <p class="text-muted small mb-0">Воспользуйтесь поиском, чтобы найти необходимый товар</p>
            </div>
          </div>
        </div>

        <!-- Шаг 2 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="d-flex align-items-start gap-4">
            <div class="step-icon flex-shrink-0">
              <img src="{{ asset('asset/img/building 1.svg') }}" alt="" width="56" height="56">
            </div>
            <div>
              <div class="step-number fw-bold mb-2" style="color: #00BFA5;">2</div>
              <h5 class="fw-bold mb-2">Выберите аптеку</h5>
              <p class="text-muted small mb-0">Выберите аптеку, из которой вам будет удобно забрать заказ</p>
            </div>
          </div>
        </div>

        <!-- Шаг 3 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="d-flex align-items-start gap-4">
            <div class="step-icon flex-shrink-0">
              <img src="{{ asset('asset/img/pos-terminal 1.svg') }}" alt="" width="56" height="56">
            </div>
            <div>
              <div class="step-number fw-bold mb-2" style="color: #2F80ED;">3</div>
              <h5 class="fw-bold mb-2">Оформите заказ</h5>
              <p class="text-muted small mb-0">Оформите заказ и заберите его в выбранной аптеке</p>
            </div>
          </div>
        </div>

        <!-- Шаг 4 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="d-flex align-items-start gap-4">
            <div class="step-icon flex-shrink-0">
              <img src="{{ asset('asset/img/shopping-bags 1.svg') }}" alt="" width="56" height="56">
            </div>
            <div>
              <div class="step-number fw-bold mb-2" style="color: #E74C3C;">4</div>
              <h5 class="fw-bold mb-2">Получите заказ</h5>
              <p class="text-muted small mb-0">Заберите заказ в ближайшей Вам аптеке</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <section class="reviews-section py-5">
  <div class="container" style="background-color: #F6FBFA;">
    <div class="row g-5">
      
      <!-- Левая часть — общая оценка -->
      <div class="col-lg-4">
        <div class="bg-white rounded-4 shadow p-5 text-center mx-auto" style="max-width: 380px;">
          <div class="d-flex flex-column align-items-center gap-3 mb-4">
            <h3 class="fw-bold mb-0">Средняя оценка аптеки</h3>
            <div>
              <div class="display-3 fw-bold mb-0">
                {{ number_format($averageRating, 1) }}
              </div>
              <div class="text-warning fs-4">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= round($averageRating))
                        ★
                    @else
                        ☆
                    @endif
                @endfor
              </div>
            </div>
          </div>
          
          <p class="text-muted mb-4 small text-center">
            Общий рейтинг на основе {{ $totalReviews }}<br>отзывов наших покупателей
          </p>
          <div class="d-flex justify-content-center">
            <button class="btn btn-success rounded-pill px-5 py-3 fw-bold">
              ОСТАВИТЬ ОТЗЫВ
            </button>
          </div>
        </div>
      </div>

      <!-- Правая часть — отзывы -->
      <div class="col-lg-8">
        @foreach($approvedReviews as $review)
        <div class="bg-white rounded-4 shadow-sm p-4 mb-4">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="fw-bold">
                {{ $review->name }}, Москва, {{ $review->created_at ? $review->created_at->format('d F') : 'Недавно' }}
            </div>
            <div class="text-warning">
                @for ($i = 1; $i <= 5; $i++)
                    {{ $i <= $review->rating ? '★' : '☆' }}
                @endfor
            </div>
          </div>
          <p class="mb-0">
            {{ $review->comment }}
          </p>
        </div>
        @endforeach

        @if($totalReviews > 3)
        <div class="text-center">
          <a href="#" class="fw-bold text-decoration-none" style="color: #00BFA5;">
            > ВСЕ {{ $totalReviews }} ОТЗЫВОВ
          </a>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>
<!-- Секция "Наши партнёры" — динамически из БД -->
<section class="partners-section py-5 bg-white">
    <div class="container">
        <h2 class="fw-bold mb-5">Наши партнёры</h2>

        @if($partners->count() > 0)
            <div class="row g-5 justify-content-center">
                @php
                    // Разбиваем партнёров на 2 строки по 6 элементов
                    $chunks = $partners->chunk(6);
                @endphp

                @foreach($chunks as $chunk)
                    <div class="col-12">
                        <div class="row g-4 g-xl-5 justify-content-center align-items-center">
                            @foreach($chunk as $partner)
                                <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center">
                                    @if($partner->url)
                                        <a href="{{ $partner->url }}" target="_blank" rel="noopener">
                                            <img src="{{ asset('asset/img/' . $partner->logo) }}" 
                                                 alt="{{ $partner->name }}" 
                                                 class="img-fluid" 
                                                 style="max-height: 60px; opacity: 0.6;">
                                        </a>
                                    @else
                                        <img src="{{ asset('asset/img/' . $partner->logo) }}" 
                                             alt="{{ $partner->name }}" 
                                             class="img-fluid" 
                                             style="max-height: 60px; opacity: 0.6;">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">Партнёры скоро появятся</p>
        @endif
    </div>
</section>
<section class="py-5">
  <div class="container">

    <!-- Заголовок -->
    <h3 class="fw-bold mb-4">О компании</h3>

    <div class="row g-4">

      <!-- Колонка 1 -->
      <div class="col-lg-4">
        <p class="mb-3">
          «Аптека онлайн» — это современная цифровая аптека, созданная для того, чтобы забота о здоровье была доступной, удобной и безопасной. Мы работаем с 2015 года и за это время стали надёжным партнёром для тысяч семей по всей России.
        </p>
        <p class="mb-3">
          Наша миссия — обеспечить каждого человека качественными лекарствами, витаминами и средствами гигиены в кратчайшие сроки, не заставляя тратить время на поиски и очереди.
        </p>
      </div>

      <!-- Колонка 2 -->
      <div class="col-lg-4">
        <p class="mb-3">
          Все товары в нашем каталоге сертифицированы, имеют полный пакет документов и поставляются напрямую от производителей и официальных дистрибьюторов. Мы строго соблюдаем условия хранения и транспортировки, особенно для термолабильных препаратов.
        </p>
        <p class="mb-3">
          Наши фармацевты и консультанты всегда готовы помочь с подбором аналогов, ответить на вопросы по применению и проконсультировать по взаимодействию препаратов.
        </p>
      </div>

      <!-- Колонка 3 -->
      <div class="col-lg-4">
        <p class="mb-3">
          Благодаря собственной логистике и сети филиалов в Москве, Новосибирске и других городах, мы доставляем заказы в течение 1–2 часов по городу и в течение дня — по области.
        </p>
        <p>
          Мы дорожим вашим доверием и делаем всё, чтобы вы чувствовали заботу с первого клика — до получения заказа и после него.
        </p>
      </div>

    </div>

    <!-- Блок с иконкой и текстом -->
    <div class="d-flex align-items-center mb-4 p-4 rounded" style="background-color: #F6FBFA;">
      <span class="me-3 d-flex align-items-center p-3">
        <img src="{{ asset('asset/img/error_outline.svg') }}" alt="icon" style="width: 24px; height: 24px;" />
      </span>
      <p class="mb-0">
        Все лекарственные препараты отпускаются строго по рецепту врача в соответствии с законодательством РФ. Перед оформлением заказа на рецептурные средства наш фармацевт свяжется с вами для уточнения данных. Безрецептурные товары доступны к покупке сразу.
      </p>
    </div>

    <!-- Дополнительный текст -->
    <p class="mb-4">
      Мы не просто продаём лекарства — мы заботимся о вашем здоровье, предоставляя проверенные средства, честные цены и поддержку 24/7.
    </p>

    <!-- Кнопка -->
    <a href="#" class="fw-semibold" style="text-decoration: none; color: #00BFA5;">
      ➤ Подробнее о нашей миссии
    </a>

  </div>
</section>
    </div>

@endsection