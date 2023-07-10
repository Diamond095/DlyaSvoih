<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class AdminOrdersController extends Controller
{
    public function orders_view()
    {
        $categories = Category::all();
        return view('orders', compact('categories'));
    }
    public function getOrders()
    {
        $date = Carbon::now()->toDateString();
        $orders = Order::whereDate('created_at', $date)->get();
        foreach ($orders as $order) {
            $order['custumer_id'] = $order->custumer;
        }
        return json_encode($orders);
    }
    public function getBasketInOrder()
    {
    }
    public function updateStatusOrder($id)
    {
        $order = Order::find($id)->update(['status' => 'Доставлен']);
        return $order;
    }
    public function getInfoAboutCustumer($id)
    {
        $order = Order::find($id);
        $custumer = $order->custumer;
        $categories = Category::all();
        return view('custumerInfo', compact('custumer', 'categories'));
    }
    public function getInfoAboutBasket($id)
    {
        $order = Order::find($id);
        $products = $order->product->toArray();
        $categories = Category::all();
        $productsWithQuantity = array_map(function ($product) {
            $product['quantity'] = Order_Product::where('product_id', $product['id'])->select('quantity')->value('quantity');
            return $product;
        }, $products);
        return view('basketInfo', compact('productsWithQuantity', 'categories'));
    }
    public function getComment($id)
    {
        $comment = Order::where('id', $id)->select('comment')->value('comment');
        $categories = Category::all();
        return view('getComment', compact('categories', 'comment'));
    }
}
