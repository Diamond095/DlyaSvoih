<?php

use App\Http\Controllers\API\AdminOrdersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[MainController::class,'main_page'])->name('main');
Route::get('/category/{code}',[MainController::class,'category'])->name('category');
Route::get('/reviews',[ReviewsController::class,'reviews_soon'])->name('review');
Route::get('/basket',[BasketController::class,'get_basket'])->name('basket');
Auth::routes();
Route::get('/dostavka',[StaticPageController::class,'dostavka'])->name('dostavka');
Route::get('/aboutus',[StaticPageController::class,'about_us'])->name('aboutus');
Route::get('/orders', [AdminOrdersController::class,'orders_view'])->name('orders')->middleware('auth');
Route::get('/custumer/{id}', [AdminOrdersController::class,'getInfoAboutCustumer'])->middleware('auth');
Route::get('/basket/{id}', [AdminOrdersController::class,'getInfoAboutBasket'])->middleware('auth');
Route::get('/comment/{id}', [AdminOrdersController::class,'getComment'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/administration', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login/administration', [LoginController::class,'login']);
