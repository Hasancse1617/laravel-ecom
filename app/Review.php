<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }

    public static function reviews($product_id)
    {
    	$reviews = Review::with('user')->where('product_id',$product_id)->where('status',1)->get()->toArray();
    	return $reviews;
    }
}
