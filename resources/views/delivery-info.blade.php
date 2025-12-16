@extends('layouts.app')

@section('title', 'Доставка и самовывоз')

@push('styles')
<link rel="stylesheet" href="{{ asset('asset/css/delivery-info.css') }}">
@endpush
@section('content')

<div class="container py-5">
    <!-- Заголовок -->
    <p class="display-4 fw-bold mb-5" style="color: #2E3A59; font-size: 36px">Доставка и самовывоз</з>
    <div class="city-selector">
    <h2 class="city-title">Выбор города</h2>

        <div class="search-wrapper">
            <input type="text" id="city-search" class="form-control search-input" placeholder="Найдите свой город..." autocomplete="off">
            <svg class="search-icon" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.8289 13.0041L9.84773 9.02291C10.6189 8.07035 11.0832 6.85993 11.0832 5.54162C11.0832 2.48615 8.59706 0 5.54159 0C2.48612 0 0 2.48612 0 5.54159C0 8.59706 2.48615 11.0832 5.54162 11.0832C6.85993 11.0832 8.07035 10.6189 9.02291 9.84773L13.0041 13.8289C13.1179 13.9427 13.2672 13.9999 13.4165 13.9999C13.5659 13.9999 13.7152 13.9427 13.829 13.8289C14.057 13.6009 14.057 13.2322 13.8289 13.0041ZM5.54162 9.91655C3.12897 9.91655 1.16666 7.95425 1.16666 5.54159C1.16666 3.12894 3.12897 1.16664 5.54162 1.16664C7.95427 1.16664 9.91658 3.12894 9.91658 5.54159C9.91658 7.95425 7.95425 9.91655 5.54162 9.91655Z" fill="#E0E0E0"/>
            </svg>
        </div>

        <ul class="city-list" id="city-list">
            @php
                $firstCity = $cities->first();
                $otherCities = $cities->skip(1);
            @endphp

            @if($firstCity)
                <li class="city-item city-checked" data-city="{{ $firstCity->name }}">{{ $firstCity->name }}</li>
            @endif

            @foreach($otherCities as $city)
                <li class="city-item city-unchecked" data-city="{{ $city->name }}">{{ $city->name }}</li>
            @endforeach
        </ul>

        <!-- Сообщение, если ничего не найдено -->
        <div id="no-city-found" class="text-center text-gray mt-4 d-none">
            <p class="fs-5">Город не найден</p>
        </div>
    </div>

    <!-- Таблица доставки в пределах МКАД -->
    <p class="display-4 fw-bold mb-5" style="color: #2E3A59; font-size: 36px">Доставка</p>
    <h3 class="fs-4 mb-4">Доставка заказов в пределах МКАД</h3>

    <div class="table-responsive bg-light-blue rounded p-3">
        <table class="table table-borderless">
            <thead>
                <tr class="border-bottom">
                    <th class="text-dark-gray">Способ доставки</th>
                    <th class="text-dark-gray text-center">Время исполнения</th>
                    <th class="text-dark-gray text-end">Стоимость</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-bottom">
                    <td class="fw-medium">Самовывоз</td>
                    <td class="text-center text-gray"><strong>150</strong> руб.</td>
                    <td class="text-end text-gray">Бесплатно</td>
                </tr>
                <tr class="border-bottom">
                    <td class="fw-medium">Самовывоз</td>
                    <td class="text-center text-gray"><strong>150</strong> руб.</td>
                    <td class="text-end text-gray">Бесплатно</td>
                </tr>
                <tr>
                    <td class="fw-medium">Самовывоз</td>
                    <td class="text-center text-gray"><strong>150</strong> руб.</td>
                    <td class="text-end text-gray">Бесплатно</td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="text-gray mt-4 fs-5">С другой стороны начало повседневной работы по формированию позиции обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Повседневная практика показывает, что рамки и место обучения кадров позволяет выполнять важные задания по разработке модели развития...</p>

    <!-- Преимущества доставки -->
    <div class="row mt-5 g-4">
        <div class="col-md-3 text-center position-relative">
            <div class="circle-icon mx-auto mb-3">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- SMS иконка -->
            </div>
            <p class="text-dark-gray">SMS с телефоном курьера в день доставки</p>
        </div>
        <div class="col-md-3 text-center position-relative">
            <div class="circle-icon mx-auto mb-3">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Бережная транспортировка -->
            </div>
            <p class="text-dark-gray">Бережная транспортировка в надлежащих условиях</p>
        </div>
        <div class="col-md-3 text-center position-relative">
            <div class="circle-icon mx-auto mb-3">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Звонок курьера -->
            </div>
            <p class="text-dark-gray">Звонок курьера перед доставкой</p>
        </div>
        <div class="col-md-3 text-center position-relative">
            <div class="circle-icon mx-auto mb-3">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Удобный интервал -->
            </div>
            <p class="text-dark-gray">Доставка в удобный интервал времени</p>
        </div>
    </div>

    <!-- Информация о доставке -->
    <h2 class="fs-3 fw-bold mt-5 mb-4">Информация о доставке</h2>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="d-flex align-items-start">
                <div class="circle-icon flex-shrink-0 me-4">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Капсулы -->
                </div>
                <p class="text-gray">Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание дальнейших направлений развития...<br><br>Разнообразный и богатый опыт укрепление и развитие структуры играет важную роль в формировании новых предложений...</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-start">
                <div class="circle-icon flex-shrink-0 me-4">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Аптека -->
                </div>
                <p class="text-gray">Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание дальнейших направлений развития...<br><br>Разнообразный и богатый опыт укрепление и развитие структуры играет важную роль в формировании новых предложений...</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-start">
                <div class="circle-icon flex-shrink-0 me-4">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Аюрведа -->
                </div>
                <p class="text-gray">Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание дальнейших направлений развития...<br><br>Разнообразный и богатый опыт укрепление и развитие структуры играет важную роль в формировании новых предложений...</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex align-items-start">
                <div class="circle-icon flex-shrink-0 me-4">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="..." fill="white"/></svg> <!-- Инъекция -->
                </div>
                <p class="text-gray">Повседневная практика показывает, что реализация намеченных плановых заданий в значительной степени обуславливает создание дальнейших направлений развития...<br><br>Разнообразный и богатый опыт укрепление и развитие структуры играет важную роль в формировании новых предложений...</p>
            </div>
        </div>
    </div>

    <!-- Порядок обмена/возврата -->
    <h2 class="fs-3 fw-bold mt-5">Порядок обмена/возврата</h2>

    <div class="mt-4">
        <p class="text-gray fs-5">Отказаться от доставленного заказа и его оплаты возможно в следующих случаях:</p>
        <ul class="list-unstyled text-gray fs-5">
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>доставленный товар не соответствует заказанному;</li>
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>товар поврежден вследствие нарушения целостности упаковки;</li>
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>товар поврежден вследствие несоответствия упаковки характеру вложения и условиям пересылки (за исключением требований по температурному режиму).</li>
        </ul>

        <div class="d-flex align-items-start mt-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 me-3 warning-icon"><path fill-rule="evenodd" clip-rule="evenodd" d="..." fill="#EB5757"/></svg>
            <p class="text-gray fs-5">Товар может быть возвращен только в момент доставки.<br><br>Согласно Постановлению Правительства РФ от 31.12.2020 №2463 не подлежат обмену и возврату следующие товары надлежащего качества:</p>
        </div>

        <ul class="list-unstyled text-gray fs-5 mt-3">
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>Товары для профилактики и лечения заболеваний в домашних условиях, лекарственные препараты;</li>
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>Предметы личной гигиены (зубные щетки и другие аналогичные товары);</li>
            <li class="mb-3"><span class="bullet-circle d-inline-block me-3"></span>Парфюмерно-косметические товары.</li>
        </ul>
    </div>

    <!-- Карточки доставки лекарств -->
    <div class="row mt-5 g-4">
        <div class="col-md-6">
            <div class="bg-light-blue rounded-20 p-4 h-100">
                <h3 class="fs-3 fw-bold">Доставка безрецептурных лекарств</h3>
                <p class="text-gray fs-5 mt-3">Согласно указу президента №187 от 17 марта 2020 года о дистанционной продаже безрецептурных лекарств осуществляется доставка на дом безрецептурных лекарственных средств, а также БАД, медицинских изделий, товаров для дома и красоты, бытовой химии и сопутствующих товаров.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-light-blue rounded-20 p-4 h-100">
                <h3 class="fs-3 fw-bold">Доставка рецептурных лекарств</h3>
                <p class="text-gray fs-5 mt-3">Доставка рецептурных лекарств, при наличии рецепта выписанного врачом, осуществляется до ближайшей аптеки.</p>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('city-search');
    const cityList = document.getElementById('city-list');
    const cityItems = document.querySelectorAll('.city-item');
    const noCityFound = document.getElementById('no-city-found');

    // Функция поиска и фильтрации
    function filterCities() {
        const query = searchInput.value.trim().toLowerCase();
        let visibleCount = 0;

        cityItems.forEach(item => {
            const cityName = item.getAttribute('data-city').toLowerCase();

            if (cityName.includes(query)) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Показываем/скрываем сообщение "Город не найден"
        if (visibleCount === 0 && query !== '') {
            noCityFound.classList.remove('d-none');
        } else {
            noCityFound.classList.add('d-none');
        }
    }

    // Поиск при вводе
    searchInput.addEventListener('input', filterCities);

    // Клик по городу — выделяем как выбранный
    cityList.addEventListener('click', function (e) {
        const clickedItem = e.target.closest('.city-item');
        if (!clickedItem) return;

        // Снимаем выделение со всех
        cityItems.forEach(item => {
            item.classList.remove('city-checked');
            item.classList.add('city-unchecked');
        });

        // Добавляем выделение к выбранному
        clickedItem.classList.remove('city-unchecked');
        clickedItem.classList.add('city-checked');

        // Очищаем поиск и показываем все города (по желанию)
        searchInput.value = '';
        filterCities();
    });

    // Изначально показываем все города
    filterCities();
});
</script>

@endsection
