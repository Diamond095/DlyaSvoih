<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Для Своих-сайт доставки еды</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar 1</title>
    <link rel="stylesheet" href="http://dlyasvoih.by/public/css/style_of_header.css" />
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
        <li><a href="{{route('main')}}">Главная</a></li>
        <li><a href="{{route('basket')}}">Корзина</a></li>
        <li><a href="{{route('dostavka')}}">О Доставке</a></li>
        <li><a href="{{route('aboutus')}}">О нас</a></li>
        @endguest
        @auth
        <li><a href="{{route('orders')}}">Заказы</a></li>
        @endauth
        <li><a href="{{route('review')}}">Отзывы</a></li>
      </ul>
      <i class="fa fa-bars" aria-hidden="true"></i>
    </nav>
    <div class="sidebar">
      <div id="sidebar-header" class="sidebar-header">
        <i class="fa fa-times"  aria-hidden="true"></i>
      </div>
      <ul class="menu">
        @guest
        <li><a href="{{route('main')}}">Главная</a></li>
        <li><a href="{{route('basket')}}">Корзина</a></li>
        <li><a href="{{route('dostavka')}}">O Доставке</a></li>
        <li><a href="{{route('aboutus')}}">О нас</a></li>
        @endguest
        @auth
        <li><a href="{{route('orders')}}">Заказы</a></li>
        @endauth
       
        <li class="dropdown">
          <a>Категории
         <i  onclick="replaceElement()" class="fas fa-angle-down" id="down"></i>
         <i onclick="replaceElement()"  class="fas fa-angle-up" id="up"></i>
          </a>
          <ul class="hidden" id="categoryList">
            @foreach($categories as $category)
              <li><a href="{{route('category',$category->code)}}">{{$category->name}}</a></li> 
            @endforeach
          </ul>
        </li>
        <li><a href="/reviews">Отзывы</a></li>
      </ul>
    </div>
    <style>
     @media (max-width:500px) and  (min-width:400px){
.fa-times{
  transform: translate(0px,-10px);
}
 }
    </style>
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
function replaceElement() {
  var buttonDown = document.getElementById("down");
  var buttonUp = document.getElementById("up");
  if (buttonDown.style.display !== 'none') {
    buttonDown.style.display = 'none';
    buttonUp.style.display = 'contents';
  } else {
    buttonUp.style.display = 'none';
    buttonDown.style.display = 'contents';
  }
  var myList = document.getElementById("categoryList");
  if (myList.style.maxHeight) {
    myList.style.maxHeight = null;
  } else {
    myList.style.maxHeight = myList.scrollHeight + "px";
  }
}


   </script>
   </body>
</html>
