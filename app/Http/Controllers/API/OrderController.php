<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlatRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\PremisesRequest;
use App\Mail\OrderMail;
use App\Models\Custumer;
use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
   public function setOrder(OrderRequest $premisesRequest)
   {
      $data = $premisesRequest->validated();
      if (empty($data['комментарий'])) {
         $data['комментарий'] = "Нету";
      }

      if (empty($data['время'])) {
         $data['время'] = "Ближ.";
      }
      if (isset($data['блюда'])) {
         $custumer = Custumer::firstOrCreate(
            [
               'email' => $data['электронная почта'],
               'street' => $data['улица'],
               'flat' => $data['квартира']
            ],
            [
               'name' => $data['имя'],
               'email' => $data['электронная почта'],
               'phone' => $data['мобильный телефон'],
               'street' => $data['улица'],
               'flat' => $data['квартира'],
               'house' => $data['дом']
            ]
         );
         $order = Order::create(
            [
               'custumer_id' => $custumer->id,
               'comment' => $data['комментарий'],
               'type_payment' => $data['тип платежа'],
               'time' => str_replace('-', ' ',$data['время']),
               'status' => 'Не доставлен'
            ]
         );
         $data['блюда'] = json_decode($data['блюда']);
         foreach ($data['блюда'] as $product) {
            $order_product = Order_Product::create(
               [
                  'product_id' => $product->id,
                  'order_id' => $order->id,
                  'quantity' => $product->quantity
               ]
            );
         }
      }
   }
}
