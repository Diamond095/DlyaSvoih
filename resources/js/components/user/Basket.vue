
<template><section class="section-cart">
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
                    <div class="product__img"><img src="" alt="Apple MacBook Air 13"></div>
                    <div class="product__title">Apple MacBook Air 13</div>
                    <div class="product__count">
                        <div class="count">
                            <div class="count__box">
                                <input type="number" class="count__input" min="1" max="100" value="1">
                            </div>
                            <div class="count__controls">
                                <button type="button" class="count__up">
                                    <img src="./icon-up.svg" alt="Increase">
                                </button>
                                <button type="button" class="count__down">
                                    <img src="./icon-down.svg" alt="Decrease">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product__price">110 000 руб.</div>
                    <div class="product__controls">
                        <button type="button">
                            <img src="./cross.svg"  alt="Delete">
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
    <button class="button-77" role="button">Заказать</button>
</template>
<script>

</script>
<style scoped>
/* Reset and base styles  */
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap");
* {
  padding: 0px;
  margin: 0px;
  border: none;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}
.section-cart__body{
  margin-bottom:50px;
}

/* Links */
a, a:link, a:visited {
  /* color: inherit; */
  text-decoration: none;
  /* display: inline-block; */
}

a:hover {
  /* color: inherit; */
  text-decoration: none;
}

/* Common */
aside, nav, footer, header, section, main {
  display: block;
}

h1, h2, h3, h4, h5, h6, p {
  font-size: inherit;
  font-weight: inherit;
}

ul, ul li {
  list-style: none;
}

img {
  vertical-align: top;
}

img, svg {
  max-width: 100%;
  height: auto;
}

/* Form */
input, textarea, button, select {
  font-family: inherit;
  font-size: inherit;
  color: inherit;
}

input::-ms-clear {
  display: none;
}

button, input[type="submit"] {
  display: inline-block;
  box-shadow: none;
  background-color: transparent;
  background: none;
  cursor: pointer;
}

input:focus, input:active,
button:focus, button:active {
  outline: none;
}

button::-moz-focus-inner {
  padding: 0;
  border: 0;
}

label {
  cursor: pointer;
}

legend {
  display: block;
}

body {
  font-family: 'Montserrat', sans-serif;
}

.container {
  max-width: 1140px;
  padding: 0 15px;
  margin-left: auto;
  margin-right: auto;
}

.section-cart {
  padding: 50px ;
}

.section-cart__header {

  text-align: center;
}

.button-77 {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 24px;
  margin: 0;
  min-height: 64px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-77 {
    padding: 19px 32px;
  }
}

.button-77:before,
.button-77:after {
  border-radius: 80px;
}

.button-77:before {
  background-color: rgba(27, 249, 19, 0.32);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.button-77:after {
  background-color: initial;
  background-image: linear-gradient(92.83deg, #3dd600 0, #137d00 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.button-77:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
}

.button-77:active:not(:disabled) {
  color: #ccc;
}
.button-77{
  margin: 0 auto;
  display: block;
  margin-bottom:30px;
}
.button-77:active:not(:disabled):after {
  background-image: linear-gradient(0deg, rgba(74, 255, 71, 0.2), rgba(9, 239, 63, 0.2)), linear-gradient(92.83deg, #93fe80 0, #01ff01 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.button-77:disabled {
  cursor: default;
  opacity: .24;
}
.title-1 {
  font-size: 28px;
  line-height: 1.3;
  font-weight: 700;
}

.cart-header {
  display: grid;
  grid-template-columns: 2fr repeat(3, 3fr) 1fr;
  column-gap: 30px;
  padding: 22px 0;
  background-color: #EAEFF2;
  font-weight: 700;
  font-size: 13px;
  line-height: 1.2;
  letter-spacing: 0.2em;
  text-transform: uppercase;
}
@media (max-width: 600px) {
  .cart-header {
    height: 1px;
    padding: 0;
  }
  .cart-header > * {
    display: none;
  }
}

.cart-header__title {
  grid-column-start: 2;
}

.cart-footer {
  display: grid;
  grid-template-columns: 2fr repeat(3, 3fr) 1fr;
  column-gap: 30px;
  padding: 19px 0;
  background: #EAEFF2;
  font-weight: 700;
  font-size: 18px;
  line-height: 1.2;
}
@media (max-width: 600px) {
  .cart-footer {
    padding-left: 15px;
    padding-right: 15px;
    grid-template-columns: 1fr 1fr;
  }
}
@media (max-width: 400px) {
  .cart-footer {
    grid-template-columns: 1fr;
    row-gap: 10px;
  }
}

.cart-footer__count {
  grid-column-start: 3;
}
@media (max-width: 600px) {
  .cart-footer__count {
    grid-column-start: 1;
  }
}

.product {
  display: grid;
  grid-template-columns: 2fr repeat(3, 3fr) 1fr;
  column-gap: 30px;
  padding: 20px 0;
  border-bottom: 1px solid rgba(126, 155, 189, 0.3);
  font-weight: 600;
  font-size: 18px;
  line-height: 1.3;
}
@media (max-width: 600px) {
  .product {
    grid-template-columns: repeat(6, 1fr);
    grid-auto-rows: minmax(60px, auto);
    column-gap: 15px;
    row-gap: 10px;
  }
}

.product > * {
  align-self: center;
}

.product__img {
  justify-self: center;
}
@media (max-width: 600px) {
  .product__img {
    grid-column: 1/3;
  }
}

@media (max-width: 600px) {
  .product__title {
    grid-column: 3/-1;
  }
}

@media (max-width: 600px) {
  .product__count {
    grid-column: 1/3;
    justify-self: center;
  }
}

@media (max-width: 600px) {
  .product__price {
    grid-column: 3/6;
  }
}

.product__controls {
  justify-self: center;
}

.count {
  display: flex;
  column-gap: 10px;
  align-items: center;
}

.count__box {
  width: 40px;
  height: 30px;
  background: #EAEFF2;
  border-radius: 3px;
}

.count__input {
  max-width: 100%;
  padding-top: 4px;
  background-color: transparent;
  text-align: center;
  font-weight: 600;
  font-size: 18px;
  line-height: 1.3;
}

.count__input::-webkit-inner-spin-button,
.count__input::-webkit-outer-spin-button {
  appearance: none;
}

.count__controls {
  display: flex;
  flex-direction: column;
  row-gap: 9px;
}

.count__controls img {
  display: block;
}

</style>
