 @include('layouts.header')
 <link rel="stylesheet" href="http://dlyasvoih.by/public/css/style_category.css">
<body>
<div class="container-6">
 <h3 class="header-1">{{$category->name}}</h3>
 <ul class="navbar-1">
 @foreach($categories as $category_nav_bar)
 <li class="nav"><a class="nav-1" href="{{$category_nav_bar->code}}">{{$category_nav_bar->name}}</a></li>
  @endforeach
 </ul>



@vite(['resources/sass/app.scss', 'resources/js/app.js'])
 <div id="app">
 @auth
 <admin-products>
 @endauth
 @guest
 <client-products>
   @endguest
   </div>
   </div>
</body>

@include('layouts.footer')