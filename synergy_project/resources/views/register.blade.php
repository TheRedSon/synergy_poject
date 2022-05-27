@extends('layouts.layout')

@section('title')Регистрация@endsection

@section('content')
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('client.register-post') }}">
        @csrf

        <div class="form-group">
            <label for="name">Введите ФИО</label>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="ФИО">

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form group mt-2">
            <label for="email">Введите email</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="docs">Введите серию/номер паспорта</label>

            <input id="docs" type="text" class="form-control @error('docs') is-invalid @enderror" name="docs" value="{{ old('docs') }}" required autocomplete="docs" placeholder="Серия/номер паспорта">

            @error('docs')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password">Введите пароль</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password-confirm">Введите пароль повторно</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Пароль еще раз">
        </div>

        <button type="submit" class="btn btn-warning mt-3">
            Регистрация
        </button>

    </form>

@endsection
