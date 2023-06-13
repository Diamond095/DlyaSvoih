<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function main_page(){
        $categories=Category::all();
         return view('main_page',compact('categories'));
        }
        public function category($code){
           $categories=Category::all();
           $category=Category::where('code',$code)->first();
           return view('category',compact('category','categories'));
        }
}
