<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark text-white d-flex flex-column min-vh-100">

@extends('layouts.svg')

<header class="p-3 bg-dark text-white border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/home" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg width="40" height="40"><use xlink:href="#synergy"></use></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/home" class="nav-link px-2 text-white">Личный кабинет</a></li>
            </ul>

            <div class="text-end">
                @guest
                    @if (Route::has('client.login'))
                        <a class="btn btn-warning" href="{{ route('client.login') }}">Вход</a>
                    @endif

                    @if (Route::has('client.register'))
                        <a class="btn btn-outline-light" href="{{ route('client.register') }}">Регистрация</a>
                    @endif
                @else

                    <div class="logout">
                        <a class="btn btn-outline-light" href="{{ route('client.logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            Выход
                        </a>

                        <form id="logout-form" action="{{ route('client.logout') }}" method="POST" class="d-none">
                            @csrf

                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</header>

<div class='container mt-5'>
    @yield('content')
</div>

<div class="mt-5 md-5"></div>

<footer class="mt-auto border-top">
    <div class="container d-flex flex-wrap justify-content-between align-items-center py-3">
        <p class="col-md-4 mb-0 text-muted">Александр Глухов, 2022</p>

        <a href="/home">
            <svg width="40" height="40"><use xlink:href="#synergy"></use></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a target="_blank" href="https://vk.com/the_red_son" class="nav-link px-2 text-muted">VK</a></li>
            <li class="nav-item"><a target="_blank" href="https://synergy.ru/" class="nav-link px-2 text-muted">Synergy</a></li>
        </ul>
    </div>
</footer>

</body>
</html>
