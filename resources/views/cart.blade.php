<link rel="stylesheet" href="{{asset('css/style_card.css')}}">
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
       <h1>{{$product->name}}</h1>
       <h2>{{$product->price}} руб</h2>
    <a href="{{asset('/images/icons/img.png')}}" class="btn btn-success">Добавить в корзину</a>
  </div>
</div>