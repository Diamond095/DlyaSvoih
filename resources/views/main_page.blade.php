 @include('layouts.header')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="{{asset('css/style_of_main.css')}}">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Oswald&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<head>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])</head>
 <body class="antialiased">

        <div id="app">
        </div>  
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
<div class="image-grid">
@include('layouts.footer')