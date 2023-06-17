<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class BasketController extends Controller
{
  public function get_basket(){
    $categories=Category::all();
    return view('basket',compact('categories'));
  }
}
