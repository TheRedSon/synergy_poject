@extends('layouts.layout')

@section('title')Сменить пароль@endsection

@section('content')
    @foreach($data as $el)
    <form method="POST" action="{{ route('client.reset', $el->id) }}">
        @csrf

        <div class="form-group mt-2">
            <label for="password">Введите старый пароль</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password">Введите новый пароль</label>

            <input id="new-password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new-password" placeholder="Пароль">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="password-confirm">Введите новый пароль повторно</label>

            <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required autocomplete="new-password" placeholder="Пароль еще раз">
        </div>

        <button type="submit" class="btn btn-warning mt-3">
            Изменить пароль
        </button>

        </form>
    @error('formError')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
    </span>
    @enderror
    @endforeach
@endsection
