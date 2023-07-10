
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина товаров</title>
    <link rel="stylesheet" href="http://dlyasvoih.by/public/css/style_basket.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</head>
@include('layouts.header')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<body>
<div id="app">
   <basket></basket>
   </div>
    </body>
</html>
@include('layouts.footer')