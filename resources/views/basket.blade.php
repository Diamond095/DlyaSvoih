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
<body>

    <section class="section-cart">
        <header class="section-cart__header">
            <div class="container">
                <h1 class="title-1">Корзина</h1>
            </div>
        </header>
    </section>
        <div class="section-cart__body">
            <div class="container">

                <section class="cart">
                    <header class="cart-header">
                        <div class="cart-header__title">наименование</div>
                        <div class="cart-header__count">количество</div>
                        <div class="cart-header__cost">стоимость</div>
                    </header>

                    <section class="product">
                        <div class="product__img"><img src="./img/products/macbook.jpg" alt="Apple MacBook Air 13"></div>
                        <div class="product__title">Apple MacBook Air 13</div>
                        <div class="product__count">
                            <div class="count">
                                <div class="count__box">
                                    <input type="number" class="count__input" min="1" max="100" value="1">
                                </div>
                                <div class="count__controls">
                                    <button type="button" class="count__up">
                                        <img src="{{asset('/img/icons/icon-up.svg')}}" alt="Increase">
                                    </button>
                                    <button type="button" class="count__down">
                                        <img src="{{asset('/img/icons/icon-down.svg')}}" alt="Decrease">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="product__price">110 000 руб.</div>
                        <div class="product__controls">
                            <button type="button">
                                <img src="{{asset('img/icons/cross.svg')}}" alt="Delete">
                            </button>
                        </div>
                    </section>
                     <footer class="cart-footer">
                        <div class="cart-footer__count">3 единицы</div>
                        <div class="cart-footer__price">329 000 руб.</div>
                    </footer>
                </section>

            </div>
        </div>
    </body>
</html>
