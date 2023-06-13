<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Для Своих-сайт доставки еды</title>
    <link href="https://fonts.cdnfonts.com/css/handel-gothic-d" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Oswald&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style_of_header.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="header">
    <div>
        <em>
    <a href="/">
        <img src="{{asset('img/logo.PNG')}}" alt="Логотип">
    </a></em></div>

    <nav>
        <ul class="navbar">
           @guest <li><a href="/basket">Корзина</a></li>
            <li><a href="">Доставка</a></li>
            <li><a href="">О нас</a></li>
            @endguest
            @auth
            <li><a href="">Заказы</a></li>
            @endauth
            <li><a href="/reviews">Отзывы</a></li>

        </ul>

    </nav>
</div>
