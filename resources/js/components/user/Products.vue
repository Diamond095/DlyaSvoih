<template>
  <meta charset="utf-8">
  <div class="container-1">
    <div v-for="product in products" class="card-1">

      <img :src="image+'/'+product.img" class="card-img-top" alt="...">
      <div class="card-body">
        <a class="name">{{ product.name }}</a>
        <div><a class="price">{{ product.price }} руб</a></div>
        <button @click="addToBasket(product)" class="btn btn-success">Добавить в корзину</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      products: null,
      routeAPI: 'http://dlyasvoih.by/api' + window.location.pathname,
      image:import.meta.env.VITE_API_URL
    }
  },
  async mounted() {
    await this.getProducts()
  },
  methods: {
    getProducts() {
      axios.get(this.routeAPI).
        then(res => {
          this.products = res.data
        });
    },
    /** styleForEmprtyProducts(){
  if(this.products==undefined){
    document.getElementById("footer").style.marginTop="400px";
  } 
    }, */
    addToBasket(product) {
      let card = localStorage.getItem('card');
      let newProduct = [
        {
          "id": product.id,
          "quantity": 1
        }
      ];
      if (!card) {
        localStorage.setItem('card', JSON.stringify(newProduct));
      }
      else {
        card = JSON.parse(card);
        card.forEach(element => {
          if (element.id === product.id) {
            element.quantity = Number(element.quantity) + 1;
            newProduct = null;
          }
        });
        Array.prototype.push.apply(card, newProduct);
        localStorage.setItem('card', JSON.stringify(card));
      }
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

.card-1 {
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

  .card-1 {
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

@media(max-width: 450px) {
  .btn.btn-success {
    font-size: 3vw;
  }

  a.name {
    font-size: 4vw;
  }

  .price {
    font-size: 4vw;
  }
}

.price {
  color: black;
  text-decoration: none;
}

@media(min-width:768px) {
  .container-1 {
    flex-wrap: wrap;
    display: flex;
  }

  .card-1 {
    margin-left: 0;
  }
}

@media (min-width:768px) {
  .container-1 {
    display: flex;
    align-items: center;
  }
}
.card-1{
  border-style: none;
}
</style>