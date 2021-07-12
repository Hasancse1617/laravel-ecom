<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id')->select('id','category_name','url');
    }
    public function section()
    {
    	return $this->belongsTo('App\Section', 'section_id')->select('id','name');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id');
    }
    public function attributes()
    {
    	return $this->hasMany('App\ProductsAttribute');
    }
    public function images()
    {
        return $this->hasMany('App\ProductsImage');
    }
    public function colors()
    {
        return $this->hasMany('App\ProductColor');
    }
    public static function productFilters()
    {
        // product Filter
         $productFilters['fabricArray'] = array('Cotton','Polyester','wool');
         $productFilters['sleeveArray'] = array('Full Sleeve','Half Sleeve','Sleeveless');
         $productFilters['patternArray'] = array('Checked','Plain','Printed','Self');
         $productFilters['fitArray'] = array('Regular','Slim','Lose');
         $productFilters['occassionArray'] = array('Casual','Formal');
         return $productFilters;
    }
    public static function getDiscountedPrice($product_id)
    {
        $proDetails = Product::select('product_price','product_discount','category_id')->where('id',$product_id)->first()->toArray();
        $catDetails = Category::select('category_discount')->where('id',$proDetails['category_id'])->first()->toArray();
        //If Product Discount
        if ($proDetails['product_discount'] > 0) {
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $proDetails['product_discount'] / 100);
            $discount = $proDetails['product_discount'];
        }
        elseif ($catDetails['category_discount'] > 0) {
            $discounted_price = $proDetails['product_price'] - ($proDetails['product_price'] * $catDetails['category_discount'] / 100);
            $discount = $catDetails['category_discount'];
        }
        else {
            $discounted_price = 0;
            $discount = 0;
        }
        return array('discounted_price'=>$discounted_price,'discount'=>$discount);
    }

    public static function getDiscountAttrprice($product_id, $size){
        $proAttrPrice = ProductsAttribute::where(['product_id'=>$product_id,'size'=>$size])->first()->toArray();
        $proDetails = Product::select('product_discount','category_id')->where('id',$product_id)->first()->toArray();
        $catDetails = Category::select('category_discount')->where('id',$proDetails['category_id'])->first()->toArray();
        if ($proDetails['product_discount'] > 0) {
            $final_price = $proAttrPrice['price'] - (($proAttrPrice['price'] * $proDetails['product_discount'])/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }else if ($catDetails['category_discount'] > 0) {
            $final_price = $proAttrPrice['price'] - (($proAttrPrice['price'] * $catDetails['category_discount'])/100);
            $discount = $proAttrPrice['price'] - $final_price;
        }else {
            $final_price = $proAttrPrice['price'];
            $discount = 0;
        }
        return array('product_price'=>$proAttrPrice['price'],'final_price'=>$final_price,'discount'=>$discount);
    }

    public static function getProductImage($product_id)
    {
        $getProductImage = Product::select('main_image')->where('id',$product_id)->first()->toArray();
        return $getProductImage;
    }
}
