<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    public static function hoverImage($id)
    {
    	$image = ProductsImage::where('product_id',$id)->first();

    	return $image;
    }
}
