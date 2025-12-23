@extends('layouts.app')

@section('title', 'Профиль')

@section('content')
<div class="container py-5">
    @auth
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                    <h2 class="fw-bold mb-4">Ваш профиль</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>ФИО:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            @if(auth()->user()->phone)
                                <p><strong>Телефон:</strong> {{ auth()->user()->phone }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <p><strong>Дата регистрации:</strong> {{ auth()->user()->created_at->format('d.m.Y') }}</p>
                            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                                    Выйти из аккаунта
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 text-center">
                    <div class="mb-4">
                        <i class="fas fa-user-lock fa-3x text-muted"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Требуется авторизация</h3>
                    <p class="text-muted mb-4">
                        Чтобы просматривать и управлять своим профилем, пожалуйста, войдите в аккаунт или зарегистрируйтесь.
                    </p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('login') }}" class="btn rounded-pill py-3 fw-bold text-white" 
                           style="background: #00bfa5; border: none; box-shadow: 0 6px 16px rgba(0,191,165,0.3);">
                            Войти
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary rounded-pill py-3 fw-bold">
                            Создать аккаунт
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
@endsection