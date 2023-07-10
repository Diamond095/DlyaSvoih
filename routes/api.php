<?php

use App\Http\Controllers\API\AdminOrdersController;
use App\Http\Controllers\API\BasketController;
use App\Http\Controllers\API\MakeBearerToken;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ReviewsController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewsController as ControllersReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/category/{code}',[ProductController::class,'get_products_in_menu']);
Route::get('/all-products/{code}',[ProductController::class,'all_products_out_menu']);
Route::patch('/category/{id}',[ProductController::class,'delete_from_menu']);
Route::patch('/all-products-out-menu/{id}',[ProductController::class,'add_to_menu']);
Route::get('/basket/product/{id}',[BasketController::class,'getProductInBasket']);
Route::post('/order/premises',[OrderController::class,'orderWithPremisesWorkUser']);
Route::post('/setorder', [OrderController::class,'setOrder']);
Route::get('/orders',[AdminOrdersController::class,'getOrders']);
Route::patch('/updateStatus/{id}',[AdminOrdersController::class,'updateStatusOrder']);
Route::post('/authorization/login', [MakeBearerToken::class,'MakeToken']);
Route::get('/reviews',[ReviewsController::class, 'getReviews']);
Route::post('/set/review',[ReviewsController::class, 'makeReview']);
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
