<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Claims\Custom;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
        'custumer_id', 
        'rate',
        'text'
    ];
    public function custummer(){
        return $this->belongsTo(Custumer::class);
    }
}
