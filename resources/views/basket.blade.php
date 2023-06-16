<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина товаров</title>
    <link rel="stylesheet" href="{{asset('/css/style_basket.css')}}">
</head>
@include('layouts.header')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<body>
<div id="app">
   <basket></basket>
   </div>
    </body>
</html>
@include('layouts.footer')