@extends('base')

@section('title', 'Блог ЛарА - Вход')

@section('h1', 'Форма входа')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class='form-label'>Email</label>
            <input 
                id="email" 
                class="form-control" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                aria-describedby="emailHelp" 
                minlength="3"
                maxlength="50" 
                required 
            />
            <div id="emailHelp" class="form-text">Количество символов: от 1 до 50</div>
        </div>
        <div class="mb-3">
            <label for="password" class='form-label'>
                {{ __('Введите пароль. ') }} <a href="{{ route('password.request') }}">{{ __(' Нажмите здесь, если забыли') }}</a>
            </label>
            <input 
                id="password" 
                class="form-control" 
                type="password" 
                name="password" 
                aria-describedby="passHelp" 
                autocomplete="current-password" 
                minlength="8"
                maxlength="20"
                required 
            />
            <div id="passHelp" class="form-text">Количество символов: от 8 до 20</div>
        </div>
        <div class="mb-3">
            <label for="remember_me" class="form-label">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                {{ __('Запомнить меня') }}
            </label>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        @if ($error = 'These credentials do not match our records.')
                            <li>Неверная почта или пароль</li>
                        @else
                            <li>{{ $error }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif

        <div class='mb-3'>
            <a class="btn btn-secondary" href="{{ route('register') }}">
                {{ __('Зарегистрироваться') }}
            </a>
            <button class="btn btn-primary float-end">
                {{ __('Войти') }}
            </button>
        </div>
    </form>
@endsection