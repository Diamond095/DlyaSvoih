import './bootstrap';
import { createApp } from 'vue';
import moment from 'moment';


import Client_Products from './components/user/Products.vue';
import Admin_Products from './components/admin/Products.vue';
import ProductOutMenu from './components/admin/Products_Out_Menu.vue';
import Basket from './components/user/Basket.vue';
import Orders from './components/admin/Orders.vue';
import Reviews from './components/user/Reviews.vue';

const app = createApp({});

app.component('client-products',Client_Products);
app.component('admin-products',Admin_Products);
app.component('products-out-menu',ProductOutMenu);
app.component('basket',Basket);
app.component('orders',Orders);
app.component('reviews', Reviews);

app.mount('#app');