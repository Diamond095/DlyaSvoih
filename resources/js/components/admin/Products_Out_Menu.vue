<template>
  <button @click="this.openModal()" class="btn btn-primary" id="open-modal-button">Добавить в меню</button>
<div id="my-modal" class="modal">
 <div class="modal-content">
   <span @click="this.closeModal()" class="close">&times;</span>
   <h2>Блюда,которых нет в меню</h2>
   <table>
     <thead>
       <tr>
         <th>Наименование</th>
         <th>Цена</th>
         <th></th>
       </tr>
     </thead>
     <tbody>
       <tr v-for="product in  products" :id="product.id">
         <td>{{ product.name }}</td>
         <td>{{ product.price }}</td>
         <td><button @click="this.addToMenu(product.id)" id="add" class="btn btn-success">Добавить в меню</button></td>
       </tr>
       <tr>
     </tr>
     </tbody>
   </table>
 </div>
</div>
 </template>
 
 <script>
 export default {
   data() {
     return {
       showModal: false,
       products: null,
       location:window.location.pathname.split('/')[2]
     };
   },
 async mounted(){
      await this.getProductsOutMenu(),
      this.addToMenu(),
      this.closeModal()
   },
   methods: {
     openModal() {
       var modal = document.getElementById("my-modal");
       document.querySelector('.container-1').style.display="none";
       document.querySelector('.navbar-1').style.display="none";
       document.querySelector('.btn.btn-primary').style.display="none";
       modal.style.display = "contents";
     },
     closeModal() {
       var modal = document.getElementById("my-modal");
       document.querySelector('.container-1').style.display="flex";
       document.querySelector('.navbar-1').style.display="block";
       document.querySelector('.btn.btn-primary').style.display="block"; 
       modal.style.display = "none";
     },
   getProductsOutMenu(){
       axios.get('http://dlyasvoih.by/api/all-products/'+this.location).
       then(res=>{
       this.products=res.data
         });

   },
   addToMenu(id_product){
    document.getElementById(id_product).style.display="none";
     axios.patch('/api/all-products-out-menu/'+id_product);
},
}
 };
 </script>
 
 <style scoped>
.btn.btn-primary{
    margin-left: auto;
    margin-right: auto;
    margin-bottom:30px;
    display:block;
}
.modal {
 display: none;
 position: fixed;
 z-index: 1;
 left: 0;
 top: 0;
 width: 100vw;
 height: 100vh;
 overflow: auto;
 background-color: rgba(0, 0, 0, 0.4);
}

/* Контент модального окна */
.modal-content {
 background-color: #fefefe;
 margin: 10% auto;
 padding: 20px;
 border: 1px solid #888;
 width: 80%;
 max-width: 600px;
}
.btn.btn-success{
 margin-bottom: 6px;
 size:150%;
}
/* Закрытие модального окна */
.close {
 color: #aaa;
 float: right;
 font-size: 28px;
 font-weight: bold;
}

.close:hover,
.close:focus {
 color: black;
 text-decoration: none;
 cursor: pointer;
}

/* Адаптивный дизайн для мобильных устройств */
@media screen and (max-width: 600px) {
 .modal-content {
   margin: 30% auto;
   width: 90%;
 }
}
#add{
size:30px;
}

 </style>
 