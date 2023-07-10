<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Custumer;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'custumer_id', 'type_payment', 
        'comment', 'time','status'
    ];
    public function custumer(){
        return $this->belongsTo(Custumer::class);
    }
    public function product(){
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id');
    }

}
