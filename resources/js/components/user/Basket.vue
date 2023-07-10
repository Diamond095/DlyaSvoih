<template>
  <section class="section-cart">
    <header class="section-cart__header">
      <div class="container">
        <h1 class="title-1" id="title">Корзина</h1>
        <h1 v-show="this.products === null" id="empty" class="empty">Корзина пуста, добавьте что-нибудь, чтобы сделать заказ
        </h1>
      </div>
    </header>
  </section>
  <div v-if="products != null" id="basket" class="section-cart__body">
    <div class="container">

      <section class="cart">
        <header class="cart-header">
          <div class="cart-header__title">наименование</div>
          <div class="cart-header__count">количество</div>
          <div class="cart-header__cost">стоимость</div>
        </header>
        <section v-for="product in this.ProductsWithQuantity" :id="product.id" class="product">
          <div class="product__img"><img :src="image+'/'+product.img" alt="product"></div>
          <div class="product__title">{{ product.name }}</div>
          <div class="product__count">
            <div class="count">
              <div class="count__box">
                <input type="number" class="count__input" min="1" max="30" :value="product.quantity">
              </div>
              <div class="count__controls">
                <button @click="addProductInBasket(product)" type="button" class="count__up">
                  <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 7L7 1L1 7" stroke="#A0BBCC" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
                <button @click="this.minusProduct(product)" type="button" class="count__down">
                  <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L13 1" stroke="#A0BBCC" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="product__price">{{ Math.floor(product.price * product.quantity * 10) / 10 }} руб</div>
          <div class="product__controls">
            <button @click="this.removeProduct(product, product.id)" type="button">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18" stroke="#7E9BBD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 6L18 18" stroke="#7E9BBD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>

            </button>
          </div>

        </section>
        <footer class="cart-footer">
          <button @click="clearBasket()" class="button-24">Удалить корзину</button>
          <div class="cart-footer__count">Общая стоимость:</div>
          <div class="cart-footer__price">{{  Math.floor(this.summOfPrice * 10) / 10}} руб</div>
        </footer>
      </section>
    </div>
  </div>
  <p v-if="this.summOfPrice < 5 && this.summOfPrice != null && this.summOfPrice != 0" class="error-message">Стоймость вашей корзины
    меньше 5 рублей, пожалуйста добавьте еще товаров</p>
  <p v-if="products!= null && now>=19 || now<9" class="error-message">К сожалению, рабочий день курьеров закончен,пока что заказы
    больше не принимаются</p>
  <button  v-if="products != null && now<19 && now>8" @click="this.openModal()" class="button-77" id="makeOrder" role="button">Оформить
заказ</button>
  <form-order v-if="this.status_popup" @closeModal="closePopUp" />
  {{ styleForEmptyBasket() }}
</template>
<script>
import Form from './Form_Order.vue';

export default {

  components: {
    'form-order': Form
  },

  data() {
    return {
      products: null,
      ProductsWithQuantity: null,
      summOfPrice: null,
      filter_products: [],
      status_popup:null,
      InfoAboutProducts: null,
      value_question_about_delivery: null,
      now: new Date().getHours(),
      image:import.meta.env.VITE_API_URL
    }
  },
  async mounted() {
    await this.getBasket();
    await this.setNewArrayWithProducts();
    this.summPriceInBasket();
    this.clearLocalStorageAfteraDay();
  },

  methods: {
    clearLocalStorage() {
      localStorage.clear();
    },
    clearLocalStorageAfteraDay() {
      const now = new Date();
      const tomorrow = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1);
      const timeUntilTomorrow = tomorrow.getTime() - now.getTime();
      setTimeout(() => {
        clearLocalStorage();
        setDailyClear();
      }, timeUntilTomorrow);
    },
    closeModalWithoutRequest() {
      if (this.value_question_about_delivery != null) {
        document.querySelector('.modal.active').style.display = 'none';
        localStorage.setItem('status_modal_window', this.value_question_about_delivery);
      }
    },

    openModal() {
      if (this.summOfPrice >= 5) {
        this.status_popup = true;
        const body = document.getElementsByTagName("body")[0];
        body.classList.add("modal-open");
        body.style.overflow = "hidden";
      }
    },
    closePopUp() {
      this.status_popup = false
      let body = document.getElementsByTagName("body")[0]
      body.style.removeProperty('overflow');
    },
    getBasket() {
      this.products = JSON.parse(localStorage.getItem('card'));
    },
    async setNewArrayWithProducts() {
      await this.getBasket();
      await this.products.forEach(
        product => {
          this.filter_products.push(product.id);
        })
      await axios.get('http://dlyasvoih.by/api/basket/product/' + this.filter_products).
        then(res => {
          this.InfoAboutProducts = res.data;
          this.ProductsWithQuantity = this.InfoAboutProducts.map((obj1) => {
            const obj2 = this.products.find((obj2) => obj2.id === obj1.id);
            return { ...obj1, ...obj2 };
          });
        })
    },
    addProductInBasket(product) {
      if (product.quantity == 30) return
      product.quantity++;
      this.products.forEach(
        product_1 => {
          if (product_1.id === product.id) {
            product_1.quantity++;
          }
        }
      )
      this.summOfPrice = this.summOfPrice + product.price;
      this.updateBasket()
    },
    minusProduct(product) {
      if (product.quantity === 1) return
      product.quantity--;
      this.products.forEach(
        product_1 => {
          if (product_1.id === product.id) {
            product_1.quantity--;
          }
        }
      )
      this.summOfPrice = this.summOfPrice - product.price;
      this.updateBasket()
    },
    summPriceInBasket() {
      this.ProductsWithQuantity.forEach(product => {
        this.summOfPrice = this.summOfPrice + product.price * product.quantity;
      });
    },
    clearBasket() {
      localStorage.removeItem('card');
      document.getElementById("basket").style.display = "none";
      document.getElementById("makeOrder").style.display = "none";
      document.getElementById("footer").style.bottom = "0";
      document.getElementById("footer").style.left = "0";
      document.getElementById("empty").style.display = "contents";
      document.getElementById("title").style.marginBottom = "30px";
      document.getElementById("footer").style.marginTop = "400px";
      document.querySelector('.error-message').style.display = "none";
    },
    styleForEmptyBasket() {
      if (!localStorage.getItem('card')) {
        document.getElementById("footer").style.marginTop = "400px";
        document.getElementById("footer").style.bottom = "0";
        document.getElementById("footer").style.left = "0";
      }
    },
    updateBasket() {
      localStorage.setItem('card', JSON.stringify(this.products));
    },
    removeProduct(product, id) {
      let card = localStorage.getItem('card');
      this.products = this.products.filter(product => {
        return product.id !== id;
      });

      document.getElementById(id).style.display = "none";
      this.summOfPrice = this.summOfPrice - product.price * product.quantity;
      this.updateBasket();
      if (this.products.length == 0) {
        localStorage.removeItem('card');
        document.getElementById("empty").style.display = "contents";
        document.getElementById("basket").style.display = "none";
        document.getElementById("makeOrder").style.display = "none";
        document.getElementById("footer").style.bottom = "0";
        document.getElementById("title").style.marginBottom = "30px";
        document.getElementById("footer").style.left = "0";
        document.getElementById("footer").style.marginTop = "400px";
        document.querySelector('.error-message').style.display = "none";
      }
    }
  }
}
</script>
<style scoped>
/* Reset and base styles  */
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap");

* {
  padding: 0px;
  margin: 0px;
  border: none;
}

.question {
  text-align: center;
  margin-top: 10px;

  font-size: 20px;
}

body.modal-open {
  overflow: hidden;
}

.modal.active {
  display: block;
}

.modal {
  display: none;
}

.modal-content {
  width: 50vw;
  transform: translate(25vw, 35vh);
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

.error-message {
  margin-bottom: 10px;
  text-align: center;
  font-size: 20px;
  color: red;
}

.section-cart__body {
  margin-bottom: 20px;
}

body.modal-open {
  overflow: hidden;
}

/* Links */
a,
a:link,
a:visited {
  /* color: inherit; */
  text-decoration: none;
  /* display: inline-block; */
}

a:hover {
  /* color: inherit; */
  text-decoration: none;
}

.cart-footer__count {
  transform: translate(-60px);
}

.cart-footer__price {
  transform: translate(-30px);
}

/* Common */
aside,
nav,
footer,
header,
section,
main {
  display: block;
}

h1,
h2,
h3,
h4,
h5,
h6,
p {
  font-size: inherit;
  font-weight: inherit;
}

ul,
ul li {
  list-style: none;
}

img {
  vertical-align: top;
}

#modal-up {
  margin-top: 10px;
}

#modal-down {
  margin-bottom: 10px;
}

img,
svg {
  max-width: 100%;
  height: auto;
}

h1.empty {
  margin-top: 30px;
  font-size: 30px;
}

/* Form */
input,
textarea,
button,
select {
  font-family: inherit;
  font-size: inherit;
  color: inherit;
}

input::-ms-clear {
  display: none;
}

button,
input[type="submit"] {
  display: inline-block;
  box-shadow: none;
  background-color: transparent;
  background: none;
  cursor: pointer;
}

input:focus,
input:active,
button:focus,
button:active {
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
  padding: 50px;
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
  font-family: Eina01, sans-serif;
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

.button-77 {
  margin: 0 auto;
  display: block;
  margin-bottom: 30px;
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

  .cart-header>* {
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

  .product__img {
    display: none;
  }
}

@media (max-width: 400px) {
  section.cart-footer {
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

@media (max-width: 600px) {
  button.button-24 {
    width: 25vw;
  }


  .product__title {
    margin-left: 13vw;
  }

  .product__price {
    margin-left: 13vw;
  }

  .cart-footer__count {
    display: none;
  }

  .cart-footer__price {
    transform: translate(0);
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
    column-gap: 15px;
    row-gap: 10px;
  }
}

.product>* {
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

@media (max-width: 400px) {
  .card-footer {
    grid-auto-rows: none;
  }
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

.button-24 {
  margin-left: 3vw;
  background: #FF4742;
  border: 1px solid #FF4742;
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
  font-size: 16px;
  font-weight: 800;
  line-height: 16px;
  min-height: 40px;
  outline: 0;
  padding: 12px 14px;
  text-align: center;
  text-rendering: geometricprecision;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: 19vw;
}

.button-24:hover,
.button-24:active {
  background-color: initial;
  background-position: 0 0;
  color: #FF4742;
}

.container label input {
  position: absolute;
  left: -9999px;
}

.container label input:checked+span {
  background-color: #418143;
  color: white;
}

.container label input:checked+span:before {
  box-shadow: inset 0 0 0 0.4375em #054f00;
}

.container label span {
  display: flex;
  align-items: center;
  padding: 0.375em 0.75em 0.375em 0.375em;
  border-radius: 99em;
  transition: 0.25s ease;
  color: #418141;
}

.container label span:hover {
  background-color: #d8e5d6;
}

.container label span:before {
  display: flex;
  flex-shrink: 0;
  content: "";
  background-color: #fff;
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  margin-right: 0.375em;
  transition: 0.25s ease;
  box-shadow: inset 0 0 0 0.125em #005c02;
}

.container {
  display: flex;
  flex-direction: column;
}

.container label {
  width: 30vw;
}

.send-btn {
  border: 2px solid;
  border-color: #1ca800;
  padding: 10px 14px;
  background-color: rgb(255, 255, 255);
  color: rgb(0, 0, 0);
  margin-top: 10px;
  font-size: 16px;
  display: flex;
  margin: 0 auto;
  border-radius: 10px;
  cursor: pointer;
  margin-bottom: 20px;
  transition: background-color .2s;
}</style>
