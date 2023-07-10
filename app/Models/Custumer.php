<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumer extends Model
{
    use HasFactory;
    
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }

    protected $fillable=[
    'name','email', 'street',
    'phone', 'house', 'intercom',
    'entrance', 'flat'
    ];
}

