@extends('layouts.layout')
@section('title')Вход@endsection()
@section('content')

    <h1>Вход</h1>

    <form method="POST" action="{{ route('client.login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Введите email</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password">Введите пароль</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                Запомнить меня
            </label>
        </div>

        <button type="submit" class="btn btn-warning mt-3">
            Вход
        </button><br>
    </form>

@endsection
