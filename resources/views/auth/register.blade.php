@extends('layouts.app')

@section('title', 'Регистрация — Аптека онлайн')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Создать аккаунт</h2>
                    <p class="text-muted small">Зарегистрируйтесь, чтобы оформлять заказы, отслеживать статус и управлять профилем</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">ФИО *</label>
                        <input type="text" 
                               class="form-control rounded-pill @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Иванов Иван Иванович"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Email *</label>
                        <input type="email" 
                               class="form-control rounded-pill @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="example@mail.ru"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-medium">Телефон</label>
                        <input type="tel" 
                               class="form-control rounded-pill" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}" 
                               placeholder="+7 (___) ___-__-__">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-medium">Пароль *</label>
                        <input type="password" 
                               class="form-control rounded-pill @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               placeholder="Не менее 8 символов"
                               required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-medium">Повторите пароль *</label>
                        <input type="password" 
                               class="form-control rounded-pill" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required>
                    </div>

                    <button type="submit" 
                            class="btn w-100 rounded-pill py-3 fw-bold text-white"
                            style="background: #00bfa5; border: none; box-shadow: 0 6px 16px rgba(0,191,165,0.3);">
                        Зарегистрироваться
                    </button>

                    <div class="text-center mt-3">
                        <p class="mb-0 text-muted small">
                            Уже есть аккаунт? <a href="{{ route('login') }}" class="text-decoration-none" style="color: #00bfa5; font-weight: 600;">Войти</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection