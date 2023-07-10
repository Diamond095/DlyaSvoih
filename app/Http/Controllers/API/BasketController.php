<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class BasketController extends Controller
{
    public function getProductInBasket($id){
    $array_with_id=explode(',',$id);
    $product=Product::whereIn('id',$array_with_id)->get();
    return json_encode($product);
    }
}
