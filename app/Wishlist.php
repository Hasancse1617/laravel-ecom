<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function product()
    {
    	return $this->belongsTo('App\Product','product_id')->select('id','product_name','product_price','main_image');
    }
}
