<x-mail::message>
@foreach ($productsInOrder as $product )
<a>{{$product->id}}</a>
@endforeach
    

</x-mail::message>
