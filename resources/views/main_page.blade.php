 @include('layouts.header')
<link rel="stylesheet" href="http://dlyasvoih.by/public/css/style_of_main.css">
<head>@vite(['resources/sass/app.scss', 'resources/js/app.js'])</head>
 <body class="antialiased">
<div class="container-5">
<div class="image-grid">
@foreach ($categories as $category)
<a href="{{route('category', $category->code)}}">
    <div id="{{$category->id}}" class="shadow-2">
        <img src="{{asset($category->img)}}">
        <div class="text-overlay">{{$category->name}}</div>
    </div>
    </a>
    @endforeach
</div>
</div>
</body>
@include('layouts.footer')
<script>
let currentTime=new Date().getHours();
if(currentTime>=12||currentTime<10){
    document.getElementById(8).style.display="none"
}
</script>

