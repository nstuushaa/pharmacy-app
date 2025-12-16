<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Мой сайт')</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <!-- Подключаем шапку -->
    @include('partials.header')

    <!-- Основной контент страницы -->
    <main>
        @yield('content')
    </main>

</body>
</html>
