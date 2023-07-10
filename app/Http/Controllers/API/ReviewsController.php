<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Custumer;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{
    public function makeReview(ReviewRequest $request){
     $data=$request->validated();
     if(empty($data['отзыв'])){
      $data['отзыв']='';
     }
     $custumer=Custumer::where([
        'name'=>$data['имя'], 
        'street'=>$data['улица'],
        'house'=>$data['дом'],
        'flat'=>$data['квартира']
     ])->first();
     if($custumer==null){
       return response()->json(['message' => 'Вы никогда не заказывали у нас, чтобы сделать отзыв надо что-то заказать'], 422);
     } else{
        $review=Review::create(
            [
                'text'=>$data['отзыв'],
                'custumer_id'=>$custumer->select('id')->value('id'),
                'rate'=>$data['оценка сервиса']
            ]
            );  
     }
    }
    public function getReviews(){
    $reviews=Review::all();
    $newreviews=$reviews->toArray();
    $reviewsWithcustumerName = array_map(function ($review) {
        $review['name']=Custumer::where('id',$review['custumer_id'])->select('name')->value('name');
        return $review;
    }, $newreviews);
    return json_encode($reviewsWithcustumerName);
    }
}
