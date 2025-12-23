<!-- Верхняя полоска -->
<div class="header-top py-2 border-bottom">
  <div class="container">
    <div class="row align-items-center gy-2">
      <div class="col-md-6 d-flex align-items-center flex-wrap gap-3 gap-md-4">
        <div class="d-flex align-items-center gap-2">
          <img src="{{ asset('asset/img/near_me.svg') }}" alt="" width="18" height="18">
          @if(isset($city))
              <div class="dropdown">
                  <a class="text-dark text-decoration-none dropdown-toggle fw-medium" href="#" role="button" data-bs-toggle="dropdown">
                      {{ $city->name }}
                  </a>
                  <ul class="dropdown-menu">
                      @foreach($cities as $c)
                          <li>
                              <a class="dropdown-item" href="{{ url($c->slug) }}">
                                  {{ $c->name }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </div>
          @else
              <span>Город</span>
          @endif
      </div>
        <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-2">
          <img src="{{ asset('asset/img/menu.svg') }}" alt="" width="18" height="18">
          <span class="d-none d-sm-inline">Служебные страницы</span>
          <span class="d-inline d-sm-none">Меню</span>
        </a>
      </div>
      <div class="col-md-6 text-md-end d-flex justify-content-md-end align-items-center gap-3 gap-md-4 flex-wrap">
        @if(request()->route('city'))
          <a href="{{ route('favourite', ['city' => request()->route('city')]) }}" class="text-muted text-decoration-none d-flex align-items-center gap-2">
            <img src="{{ asset('asset/img/favorite_border.svg') }}" alt="" width="18" height="18">
            <span class="d-none d-sm-inline">Избранное</span>
          </a>
          <a href="{{ route('profile', ['city' => request()->route('city')]) }}" class="text-muted text-decoration-none d-flex align-items-center gap-2">
            <img src="{{ asset('asset/img/person.svg') }}" alt="" width="18" height="18">
            <span class="d-none d-sm-inline">Личный кабинет</span>
          </a>
        @else
          {{-- На глобальных страницах — показываем ссылки на login/register --}}
          <a href="{{ route('login') }}" class="text-muted text-decoration-none d-flex align-items-center gap-2">
            <img src="{{ asset('asset/img/person.svg') }}" alt="" width="18" height="18">
            <span class="d-none d-sm-inline">Войти</span>
          </a>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Основной хедер -->
<header class="header-main py-4">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-12 text-center text-lg-start mb-4 mb-lg-0">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-3">
          <img src="{{ asset('asset/img/logo.svg') }}" alt="Аптека онлайн" width="50">
          <div>
            <div class="logo-text fw-bold">Аптека онлайн</div>
            <small class="opacity-75">Ваша онлайн аптека</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12 mb-4 mb-lg-0">
        <div class="row text-center text-lg-start g-4 align-items-center">
          <div class="col-12 col-sm-4">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2">
              <img src="{{ asset('asset/img/Message_open.svg') }}" alt="" width="20" height="20">
              <div>
                <a href="mailto:INFO@RESTOLL.RU" class="text-decoration-none text-dark-gray fw-bold">INFO@RESTOLL.RU</a>
                <small class="d-block opacity-75">Напишите нам</small>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2">
              <img src="{{ asset('asset/img/Phone_duotone.svg') }}" alt="" width="20" height="20">
              <div>
                <a href="tel:88007772233" class="text-decoration-none text-dark-gray fw-bold">8-800-777-22-33</a>
                <small class="d-block opacity-75">Круглосуточно</small>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-2">
              <img src="{{ asset('asset/img/Phone_duotone.svg') }}" alt="" width="20" height="20">
              <div>
                <a href="tel:84952233403" class="text-decoration-none text-dark-gray fw-bold">8 (495) 223-34-03</a>
                <small class="d-block opacity-75">Интернет-аптека</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-12 text-center text-lg-end">
        <div class="d-flex justify-content-center justify-content-lg-end align-items-center gap-4">
          <a href="#" class="btn-icon-round"><img src="{{ asset('asset/img/search.svg') }}" alt="" width="20"></a>
          <button class="btn rounded-pill px-2 fw-bold text-white shadow w-120 w-lg-auto"
                  style="height: 56px; background: #00bfa5; border: none; box-shadow: 0 8px 20px rgba(0,191,165,0.45)">
            ЗАКАЗАТЬ ЗВОНОК
          </button>
          @if(request()->route('city'))
            <a href="{{ route('cart', ['city' => request()->route('city')]) }}" class="btn-icon-round position-relative">
              <img src="{{ asset('asset/img/shopping_cart.svg') }}" alt="" width="22">
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Меню категорий (только внутри города) -->
@if(request()->route('city'))
  <nav class="nav-category py-3 position-relative">
    <div class="container position-relative">
      <!-- Кнопка влево -->
      <button type="button"
              class="btn btn-sm btn-light position-absolute top-50 start-0 translate-middle-y shadow-sm"
              id="scroll-left"
              style="z-index: 10;">
        &#10094;
      </button>

      <!-- Контейнер прокрутки -->
      <div id="catalog-scroll" class="catalog-scroll">
        <ul class="nav-category-list">
          @forelse($catalogs as $catalog)
            <li>
              <a class="nav-category-link d-flex align-items-center"
                 href="{{ route('catalog.show', [
                     'city' => request()->route('city'),
                     'slug' => $catalog->slug
                 ]) }}">
                <img src="{{ asset('asset/img/' . $catalog->icon) }}"
                     alt="{{ $catalog->name }}" class="me-2" width="24" height="24">
                {{ $catalog->name }}
              </a>
            </li>
          @empty
            <li>Категории ещё не добавлены</li>
          @endforelse
        </ul>
      </div>

      <!-- Кнопка вправо -->
      <button type="button"
              class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y shadow-sm"
              id="scroll-right"
              style="z-index: 10;">
        &#10095;
      </button>
    </div>
  </nav>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
      const scrollContainer = document.getElementById('catalog-scroll');
      const btnLeft = document.getElementById('scroll-left');
      const btnRight = document.getElementById('scroll-right');

      if (!scrollContainer || !btnLeft || !btnRight) return;

      const firstItem = scrollContainer.querySelector('.nav-category-list li');
      const step = firstItem ? firstItem.getBoundingClientRect().width + 16 : 300;

      btnLeft.addEventListener('click', () => {
          scrollContainer.scrollBy({ left: -step, behavior: 'smooth' });
      });

      btnRight.addEventListener('click', () => {
          scrollContainer.scrollBy({ left: step, behavior: 'smooth' });
      });
  });
  </script>
@endif