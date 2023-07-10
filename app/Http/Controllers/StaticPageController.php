<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    
    public function dostavka(){
         $categories=Category::all();
        return view('dostavka',compact('categories'));
    }
    public function about_us(){
        $categories=Category::all();
        return view('about_us',compact('categories'));
    }
}
