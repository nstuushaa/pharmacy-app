@extends('layouts.app')

@section('title', 'Вход — Аптека онлайн')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Вход в аккаунт</h2>
                    <p class="text-muted small">Введите email и пароль для входа</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email *</label>
                        <input type="email" 
                               class="form-control rounded-pill @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="example@mail.ru"
                               required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium">Пароль *</label>
                        <input type="password" 
                               class="form-control rounded-pill @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               placeholder="Ваш пароль"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label small" for="remember">Запомнить меня</label>
                        </div>
                        <a href="#" class="small text-decoration-none" style="color: #00bfa5;">Забыли пароль?</a>
                    </div>

                    <button type="submit" 
                            class="btn w-100 rounded-pill py-3 fw-bold text-white"
                            style="background: #00bfa5; border: none; box-shadow: 0 6px 16px rgba(0,191,165,0.3);">
                        Войти
                    </button>

                    <div class="text-center mt-3">
                        <p class="mb-0 text-muted small">
                            Нет аккаунта? <a href="{{ route('register') }}" class="text-decoration-none" style="color: #00bfa5; font-weight: 600;">Зарегистрироваться</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection