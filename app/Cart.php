<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;

class Cart extends Model
{
    use HasFactory;

    public static function userCartItems()
    {
    	if (Auth::check()) {
    		$userCartItems = Cart::with(['product'=>function($query){$query->select('id','category_id','product_name','product_code','main_image');}])->where(['user_id'=>Auth::user()->id])->orderBy('id','desc')->get()->toArray();
    	}else {
    		$userCartItems = Cart::with(['product'=>function($query){$query->select('id','category_id','product_name','product_code','main_image');}])->where(['session_id'=>Session::get('session_id')])->orderBy('id','desc')->get()->toArray();
    	}
    	return $userCartItems;
    }

    public function product()
    {
    	return $this->belongsTo('App\Product','product_id');
    }

    public static function getProductAttrPrice($product_id,$size)
    {
    	$attrPrice = ProductsAttribute::select('price')->where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
    	return $attrPrice['price'];
    }
}
