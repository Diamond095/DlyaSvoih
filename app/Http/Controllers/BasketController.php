<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Category;


class BasketController extends Controller
{
  public function get_basket(){
    $categories=Category::all();
    return view('basket',compact('categories'));
  }
}
