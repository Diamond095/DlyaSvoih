 @include('layouts.header')
 <link rel="stylesheet" href="{{asset('css/style_category.css')}}">
<body>

<h3>{{$category->name}}</h3>
 <ul class="navbar-1">
 @foreach($categories as $category_nav_bar)
 <li class="nav"><a class="nav-1" href="{{$category_nav_bar->code}}">{{$category_nav_bar->name}}</a></li>
@endforeach
</ul>
 <div class="image-card">
 <div>@vite(['resources/sass/app.scss', 'resources/js/app.js'])</div>
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