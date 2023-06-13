<template>
    <meta charset="utf-8">
    <div class="container">
  <div v-for="product in products"  class="card" style="width: 18rem;">
    <img src="/" class="card-img-top" alt="...">
    <div class="card-body">
      <a class="name">{{product.name}}</a>
      <div><a>{{product.price}} руб</a></div>
      <button  class="btn btn-success">Добавить в корзину</button>
    </div>
  </div>
  </div>
 
  </template>
  <script>
  export default{
  data(){
      return{
       products:null,
       routeAPI:'/api'+window.location.pathname
      }
  },
   mounted() {
    this.getProducts()
  },
    methods: {
      getProducts(){
        axios.get(this.routeAPI).
        then(res=>{
          this.products=res.data
            });}
            }
            }
            </script>
<style scope>
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
</style>