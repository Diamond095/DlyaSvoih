<template>
    <section class="section-cart">
        <header class="section-cart__header">
        </header>
        <div class="section-cart__body">
            <div class="container">

                <section class="cart">
                    <header class="cart-header">
                        <div class="cart-header__count">Имя</div>
                        <div class="cart-header__count">Время</div>
                        <div class="cart-header__count">Коммент</div>
                        <div class="cart-header__count">Статус</div>
                        <div class="cart-header__count">Создан в</div>
                        <div class="cart-header__count">Корзина</div>
                    </header>

                    <section class="order" v-for="order in infoAboutOrders">
                        <header class="cart-header" id="users">
                            <a v-bind:href="`/custumer/${order.id}`"><div class="cart-header_">{{ order.custumer_id.name }}</div></a>
                            <div class="cart-headert">{{ order.time }}</div>
                            <div v-if="order.comment == 'Нету'" class="cart-header_">Нету</div>
                                <button class="btn btn-primary" v-else="order.commnet!='Нету'"><a :href="`/comment/${order.id}`">Посмотреть</a></button>
                            <button v-if="order.status == 'Не доставлен'" @click="updateStatusOrder(order.id)" :id="order.id"
                                class="btn btn-danger">{{ order.status }}</button>
                            <button v-if="order.status == 'Доставлен'" :id="order.id" class="btn btn-success">{{ order.status
                            }}</button>
                            <div class="cart-header_">{{ order.created_at }}</div>
                           <a :href="`/basket/${order.id}`"><button  class="btn btn-primary">Посмотреть</button></a>
                        </header>
                    </section>
                </section>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            infoAboutOrders: null
        }
    },
    async mounted() {
        await this.getOrders();
    },
    methods: {
        getOrders() {
            axios.get('/api/orders').then(
                res => {
                    this.infoAboutOrders = res.data;
                    let sizeOfOrdersArray = this.infoAboutOrders.length;
                  
                    for (let i = 0; i < sizeOfOrdersArray; i++) {
                        let date = new Date(this.infoAboutOrders[i].created_at);
                        let hours = date.getHours();
                        let minutes = date.getMinutes();
                        
                        this.infoAboutOrders[i].created_at = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
                    }
                    for(let i=0; i<sizeOfOrdersArray; i++){
                        if(i<sizeOfOrdersArray/2){
                        let temp=this.infoAboutOrders[i];
                        this.infoAboutOrders[i]=this.infoAboutOrders[sizeOfOrdersArray-i-1];
                        this.infoAboutOrders[sizeOfOrdersArray-i-1]=temp;
                        }
                    }

                });
        },
        updateStatusOrder(id) {
            axios.patch('/api/updateStatus/' + id);
            document.getElementById(id).className = ".btn.btn-succes";
            document.getElementById(id).innerText = "Доставлен";
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

*,
*::before,
*::after {
    box-sizing: border-box;
}

.btn-primary {
    width: 15vw;
    padding: 5px;
}

.btn.btn-danger {
    width: 14vw;
    padding: 0;
    font-size: 2vw;
}

.btn.btn-success {
    width: 14vw;
    padding: 0;
    font-size: 2vw;
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
a{
    text-decoration: none;
    color:black;
}
img,
svg {
    max-width: 100%;
    height: auto;
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
    font-family: 'M PLUS Rounded 1c', sans-serif;
}

.container {
    max-width: 1140px;
    padding: 0 15px;
    margin-left: auto;
    margin-right: auto;
}

.section-cart {
    padding: 0;
}

.section-cart__header {
    margin-bottom: 40px;
    text-align: center;
}

div.container {
    padding: 0;
    --bs-gutter-x: 0;
}

.title-1 {
    font-size: 28px;
    line-height: 1.3;
    font-weight: 700;
}

.cart-header {
    display: grid;
    grid-template-columns: 2fr repeat(3, 2fr) 1fr;
    column-gap: 15px;
    padding: 15px 0;
    background-color: #EAEFF2;
    font-weight: 700;
    font-size: 13px;
    line-height: 1.2;


}

.btn-primary {
    font-size: 2.2vw;
}

@media (max-width: 600px) {
    div.cart-header_t {
        font-size: 1vw;
    }

    .cart-header {
        font-size: 3.3vw;
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

    .cart-header {
        grid-template-columns: 0.5fr repeat(5, 0fr) 1fr;
        column-gap: 21px;
    }

    #users {
        background-color: white;
        grid-template-columns: 1fr repeat(5, 0fr) 1fr;
    }

}

.btn.b .product {
    display: grid;
    grid-template-columns: 1fr repeat(3, 3fr) 2fr;
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

/*# sourceMappingURL=main.css.map */</style>