<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function addWishlist(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$productCount = Wishlist::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
    		if ($productCount > 0) {
    			return response()->json([
                    'message'=>'Product is already exists in wishlist'
    			]);
    		}else {
    			$wishlist = new Wishlist;
    			$wishlist->user_id = $data['user_id'];
    			$wishlist->product_id = $data['product_id'];
    			$wishlist->quantity = $data['quantity'];
    			$wishlist->save();
    			$totalWishlists = totalWishlists();
    			return response()->json([
    				'totalWishlists'=>$totalWishlists,
                    'message'=>'Product is added in wishlist'
    			]);
    		}
    	}
    }

    public function wishlist()
    {
    	$user_id = Auth::user()->id;
    	$wishlists = Wishlist::with('product')->where('user_id',$user_id)->get()->toArray();
    	return view('front.wishlist.wishlist')->with(compact('wishlists'));
    }

    public function removeWishlist(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$user_id = Auth::user()->id;
    		Wishlist::where('user_id',$user_id)->where('product_id',$data['product_id'])->delete();
    		$totalWishlists = totalWishlists();
    		$wishlists = Wishlist::with('product')->where('user_id',$user_id)->get()->toArray();
    		return response()->json([
    			'totalWishlists'=>$totalWishlists,
                'view'=>(String)View::make('front.wishlist.wishlist_items')->with(compact('wishlists'))
            ]);
    	}
    }
}
