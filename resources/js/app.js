import './bootstrap';
import { createApp } from 'vue';


import Client_Products from './components/user/Products.vue';
import Admin_Products from './components/admin/Products.vue';

const app = createApp({});

app.component('client-products',Client_Products);
app.component('admin-products',Admin_Products);

app.mount('#app')
