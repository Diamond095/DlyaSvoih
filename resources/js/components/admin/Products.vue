<template>
  <meta charset="utf-8">
  <div class="container">
<div v-for="product in products"  class="card" style="width: 18rem;">
  <img src="/" class="card-img-top" alt="...">
  <div class="card-body">
    <a class="name">{{product.name}}</a>
    <div><a>{{product.price}} руб</a></div>
    <button @click.prevent="updateMenu(product.id)" class="btn btn-success">Удалить с меню</button>
  </div>
</div>
</div>
<button class="btn btn-primary" >Добавить блюдо</button>
</template>
<script>
export default{
data(){
    return{
     products:null,
     routeAPI:'/api'+window.location.pathname
    }
},
async mounted() {
  await this.getProducts(),
  this.updateMenu(product.id)
},
  methods: {
    getProducts(){
      axios.get(this.routeAPI).
      then(res=>{
        this.products=res.data
          });},
  
    updateMenu(id_product){
      axios.patch('/api/category/'+id_product);

     const card = document.querySelector('card')

     const parent = h1.parentNode

     parent.removeChild(card)

}
  }
}
</script>

<style scoped>
h1{
  margin-left:0px;
}
.container{
  max-width:1000px;
  margin-left:320px;
  display:flex;
  align-items: center;

}
.card{
  border-style: solid;
  margin-right:50px;
  margin-bottom: 25px;
  width:300px;
  margin-top:25px;
 }
a{
font-size:20px;
}
div a{
  margin-bottom: 30px;
}
.btn.btn-primary{
margin-left:334px;
}
</style>