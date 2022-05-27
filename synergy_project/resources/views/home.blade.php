@extends('layouts.layout')
@section('title')Личный кабинет@endsection
@section('content')
    <h1>Личный кабинет</h1>

    <div class="d-flex">
        @if(Auth::user()->image)
            <img src="{{ asset('/storage/' . Auth::user()->image) }}" alt="" style="width: 150px; height: 200px;" >
        @else
            <div class="border" style="width: 150px; height: 200px;"></div>
        @endif
        <div class="mx-3">
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <p>Зарегистрирован: {{date("d-m-Y", strtotime(Auth::user()->created_at))}}</p>
            <a href="{{ route('client.options') }}" class="btn btn-warning">Изменить</a>
            <a href="{{ route('client.report') }}" class="btn btn-warning">Отправить отчет</a>
        </div>
    </div>
    <form action="{{ route('client.img-upload', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input name="img" id="img" type="file" class="form-control mt-1" style="width:150px;">
        @error('img')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button class="btn btn-outline-light mt-1" type="submit">Загрузить фото</button>
    </form>
    <div class="d-flex justify-content-center">
        <svg width="480" height="240"><use xlink:href="#rhino"></use></svg>
    </div>
@endsection
