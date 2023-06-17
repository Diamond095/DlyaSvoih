<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class ReviewsController extends Controller
{
    public function reviews_soon(){
        $categories=Category::all();
        return view('reviews',compact('categories'));
    }
}
