<template>
  <meta charset="utf-8">

  <div class="container-4">
    <div class="container-1">
      <div v-for="product in products" :id="product.id" class="card">
        <img src="/" class="card-img-top" alt="...">
        <div class="card-body">
          <a class="name">{{ product.name }}</a>
          <div><a>{{ product.price }} руб</a></div>
          <button @click.prevent="updateMenu(product.id)" class="btn btn-success">Удалить с меню</button>
        </div>
      </div>
    </div>
    <products-out-menu />
  </div>
</template>
<script>
import Products_Out_Menu from './Products_Out_Menu.vue';
export default {
  components: {
    'products-out-menu': Products_Out_Menu
  },
  data() {
    return {
      products: null,
      routeAPI: '/api' + window.location.pathname
    }
  },
  async mounted() {
    await this.getProducts();
    this.updateMenu(product.id)
  },
  methods: {
    getProducts() {
      axios.get('http://dlyasvoih.by'+this.routeAPI).
        then(res => {
          this.products = res.data
        });
    },

    updateMenu(id_product) {
      axios.patch('/api/category/' + id_product);
      document.getElementById(id_product).style.display = "none";

    }
  }
}
</script>

<style scoped>
h1 {
  margin-left: 0px;
}

.name {
  text-decoration: none;
  color: black;
}

.container-1 {
  max-width: 80vw;
  align-items: center;
}

.card {
  margin-right: 3vw;
  margin-bottom: 3vw;
  width: 30vw;
}

a {
  font-size: 20px;
}

div a {
  margin-bottom: 30px;
}

.btn.btn-primary {
  margin-left: 334px;
}

.name {
  text-decoration: none;
  color: black;
}

@media(max-width:766px) {
  .container-1 {
    max-width: 100vw;
    margin: 0;
    flex-wrap: wrap;
    display: flex;
    margin-top: 20vw;
  }

  .card {
    width: 41vw;
    margin-left: 4vw;
    border-style: none;
  }
}

@media(max-width:429px) {
  .container-1 {
    margin-top: 30vw;
  }
}

@media(min-width:768px) {
  .container-1 {
    flex-wrap: wrap;
    display: flex;
  }

  .card {
    margin-left: 0;
  }
}

@media (min-width:768px) {
  .container-1 {
    display: flex;
    align-items: center;
  }
}</style>
