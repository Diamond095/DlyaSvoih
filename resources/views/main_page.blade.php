 @include('layouts.header')
<link rel="stylesheet" href="{{asset('css/style_of_main.css')}}">
<head>@vite(['resources/sass/app.scss', 'resources/js/app.js'])</head>
 <body class="antialiased">

<div class="image-grid">
@foreach ($categories as $category)
<a href="{{route('category', $category->code)}}">
    <div class="shadow-2">
        <img src="/">
        <div class="text-overlay">{{$category->name}}</div>
    </div>
    </a>
    @endforeach
</div>
</body>
@include('layouts.footer')
