<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[MainController::class,'main_page']);
Route::get('/category/{code}',[MainController::class,'category'])->name('category');
Route::get('/reviews',[ReviewsController::class,'reviews_soon']);
Route::get('/basket',[BasketController::class,'get_basket']);
Auth::routes();
Route::get('/modal',function(){
   return view('modalwindow');
});



