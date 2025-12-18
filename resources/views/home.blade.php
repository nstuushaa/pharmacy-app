@extends('layouts.app')

@section('title', 'Аптека онлайн')

@section('content')
    <h1>Главная страница</h1>
    {{-- resources/views/welcome.blade.php --}}
<div class="banners">
  @foreach($banners as $banner)
    <a href="{{ $banner->url ?: '#' }}">
      <img src="{{ asset('storage/banners/' . $banner->image) }}" 
           alt="{{ $banner->title }}"
           class="banner-image">
    </a>
  @endforeach
</div>
@endsection
