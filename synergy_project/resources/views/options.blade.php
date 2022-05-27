@extends('layouts.layout')

@section('title')Настройки@endsection

@section('content')

    @foreach($data as $el)
    <div class="my-3">
        <form action="{{ route('client.options-update', $el->id) }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group mt-2">
                    <label for="name">Редактировать ФИО</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="ФИО" value="{{$el->name}}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form group mt-2">
                    <label for="email">Редактировать email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$el->email}}" required autocomplete="email" placeholder="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="docs">Редактировать серию/номер паспорта</label>
                    <input id="docs" type="text" class="form-control @error('docs') is-invalid @enderror" name="docs" value="{{$el->docs}}" required autocomplete="docs" placeholder="Серия/номер паспорта">

                    @error('docs')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror

                </div>

                <button class="btn btn-warning mt-3" type="submit">Сохранить</button>
        </form>
        @endforeach
    </div>

    <a href="{{ route('client.options-reset') }}" class="text-decoration-none text-white">Изменить пароль</a>

@endsection
