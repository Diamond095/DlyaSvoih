<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Для Своих-сайт доставки еды</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar 1</title>
    <link rel="stylesheet" href="{{asset('css/style_of_header.css')}}" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Oswald&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  </head>
  <body>
  <div class="container-2">
     <nav>
      <div class="IMG">
        <a href="/">
          <img src="{{asset('/img/logo.PNG')}}" alt="my-avatar" />
        </a>
      </div>
      <ul class="nav-bar">
        @guest
        <li><a href="/basket">Корзина</a></li>
        <li><a href="">Доставка</a></li>
        <li><a href="">О нас</a></li>
        @endguest
        @auth
        <li><a href="">Заказы</a></li>
        @endauth
        <li><a href="/reviews">Отзывы</a></li>
      </ul>
      <i class="fa fa-bars" aria-hidden="true"></i>
    </nav>
    <div class="sidebar">
      <div class="sidebar-header">
        <i class="fa fa-times" aria-hidden="true"></i>
      </div>
      <ul class="menu">
        @guest
        <li><a href="/basket">Корзина</a></li>
        <li><a href="">Доставка</a></li>
        <li><a href="">О нас</a></li>
        @endguest
        @auth
        <li><a href="">Заказы</a></li>
        @endauth
       
        <li class="dropdown">
          <a>Категории
         <i class="fas fa-angle-down" id="down"></i>
          </a>
          <ul class="hidden" class="category-list">
            @foreach ($categories as $category)
              <li><a href="{{route('category',$category->code)}}">{{$category->name}}</a></li>  
            @endforeach
          </ul>
        </li>
        <li><a href="/reviews">Отзывы</a></li>
      </ul>
    </div>
    <script>
    const bars = document.querySelector(".fa-bars");
const sidebar = document.querySelector(".sidebar");
const closingButton = document.querySelector(".fa-times");

bars.addEventListener("click", () => {
  sidebar.classList.toggle("show-sidebar");
});

closingButton.addEventListener("click", () => {
  sidebar.classList.remove("show-sidebar");
});

</script>
   <script>
   /** const bars = document.querySelector(".fa-bars");
const sidebar = document.querySelector(".sidebar");
const closingButton = document.querySelector(".fa-times");

bars.addEventListener("click", () => {
  sidebar.classList.toggle("show-sidebar");
});

closingButton.addEventListener("click", () => {
  sidebar.classList.remove("show-sidebar");
});*/
const buttonDown=document.getElementById('down');

buttonDown.addEventListener("click",()=>{
  buttonDown.classList.replace("fa-angle-down","fa-angle-up");
});

const buttonUp=document.querySelector('fa-angle-up');
if(buttonUp!=null){
button.addEventListener("click",()=>{
  buttonUp.classList.replace('fa-angle-up','fa-angle-down');
})
}
   </script>
   </body>
</html>
