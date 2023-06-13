<?php

use App\Http\Controllers\API\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/category/{code}',[ProductController::class,'get_products']);
Route::get('/all-products',[ProductController::class,'all_products']);
Route::patch('/category/{id}',[ProductController::class,'delete_from_menu']);
