<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Compare;
use Auth;

class CompareController extends Controller
{
    public function addCompare(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$productCount = Compare::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->count();
    		if ($productCount > 0) {
    			return response()->json([
                    'message'=>'Product is already exists in compare'
    			]);
    		}else {
    			$compare = new Compare;
    			$compare->user_id = $data['user_id'];
    			$compare->product_id = $data['product_id'];
    			$compare->save();
    			return response()->json([
                    'message'=>'Product is added in Compare'
    			]);
    		}
    	}
    }

    public function compare()
    {
    	$user_id = Auth::user()->id;
    	$compares = Compare::with('product')->where('user_id',$user_id)->get()->toArray();
    	// dd($compares);
    	return view('front.compare.compare')->with(compact('compares'));
    }

    public function removeCompare(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$user_id = Auth::user()->id;
    		Wishlist::where('user_id',$user_id)->where('product_id',$data['product_id'])->delete();
    		
    		$compares = Compare::with('product')->where('user_id',$user_id)->get()->toArray();
    		return response()->json([
                'view'=>(String)View::make('front.compare.compare_items')->with(compact('compares'))
            ]);
    	}
    }
}
