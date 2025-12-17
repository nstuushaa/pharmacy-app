@extends('layouts.app')

@section('content')
    <h1>{{ $catalog->name }}</h1>
    <p>Каталог: {{ $catalog->slug }}</p>
    <!-- Здесь будет список товаров -->
@endsection