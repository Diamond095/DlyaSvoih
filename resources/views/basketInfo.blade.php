@include('layouts.header')
<div class="basket">
@foreach ($productsWithQuantity as $product)
    <h1>{{$product['name']}}<span> × {{$product['quantity']}}</span></h1>
@endforeach
</div>
<style>
.basket{
    margin:auto;
    padding-bottom:450px;
}

</style>