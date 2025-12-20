<!-- Верхняя полоска -->
<div class="header-top py-2 border-bottom">
  <div class="container">
    <div class="row align-items-center gy-2">
      <div class="col-md-6 d-flex align-items-center flex-wrap gap-3 gap-md-4">
        <div class="d-flex align-items-center gap-2">
          <img src="{{ asset('asset/img/near_me.svg') }}" alt="" width="18" height="18">
          <div class="dropdown">
            <a class="text-dark text-decoration-none dropdown-toggle fw-medium" href="#" role="button" data-bs-toggle="dropdown">
              {{ request()->route('city')->name ?? 'Город' }}
            </a>
            <ul class="dropdown-menu">
                @foreach($cities as $city)
                    <li>
                        <a class="dropdown-item" href="{{ url($city->slug) }}">
                            {{ $city->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
          </div>
        </div>
        <a href="#" class="text-muted text-decoration-none d-flex align-items-center gap-2">
          <img src="{{ asset('asset/img/menu.svg') }}" alt="" width="18" height="18">
          <span class="d-none d-sm-inline">Служебные страницы</span>
          <span class="d-inline d-sm-none">Меню</span>
        </a>
      </div>
      <div class="col-md-6 text-md-end d-flex justify-content-md-end align-items-center gap-3 gap-md-4 flex-wrap">
        <a href="{{ route('favourite', request()->route('city')->slug) }}" class="text-muted text-decoration-none d-flex align-items-center gap-2">
            <img src="{{ asset('asset/img/favorite_border.svg') }}" alt="" width="18" height="18">
            <span class="d-none d-sm-inline">Избранное</span>
        </a>
        <a href="{{ route('profile', request()->route('city')->slug) }}" class="text-muted text-decoration-none d-flex align-items-center gap-2">
            <img src="{{ asset('asset/img/person.svg') }}" alt="" width="18" height="18">
            <span class="d-none d-sm-inline">Личный кабинет</span>
        </a>
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
          <a href="{{ route('cart', request()->route('city')->slug) }}" class="btn-icon-round position-relative">
            <img src="{{ asset('asset/img/shopping_cart.svg') }}" alt="" width="22">
          </a>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Меню категорий -->
<nav class="nav-category py-3">
  <div class="container">
    <ul class="nav-category-list">
      @forelse($catalogs as $catalog)
        <li>
          <a class="nav-category-link" href="{{ route('catalog.show', ['city' => request()->route('city')->slug,'slug' => $catalog->slug]) }}">
    {{ $catalog->name }}>
            <img src="{{ asset('asset/img/' . $catalog->icon) }}" alt="{{ $catalog->name }}" class="me-2">
            {{ $catalog->name }}
          </a>
        </li>
      @empty
        <li>Категории ещё не добавлены</li>
      @endforelse
    </ul>
  </div>
</nav>