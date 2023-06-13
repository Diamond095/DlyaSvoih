<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function get_products($code){
        $category=Category::where('code',$code)->first();
        $products=Product::where('category_id',$category->id)->where('menu_status',1)->get();
        return json_encode($products);
    }
    public function all_products($code){
        $category=Category::where('code',$code)->first;
        $products=Product::where('category_id',$category->id)->where('menu_status',null)->get();
        return $products;
    }
    public function delete_from_menu($product_id){
       $updating_menu=Product::find($product_id)->update(['menu_status'=>1]);
       return $updating_menu;
    }

}
