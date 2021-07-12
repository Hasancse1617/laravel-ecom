<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use Auth;

class RatingController extends Controller
{
    public function productRating(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		$user_id = Auth::user()->id;
    		$product_rating = new Review();
    		$product_rating->user_id = $user_id;
    		$product_rating->product_id = $data['product_id'];
    		$product_rating->rating = $data['rating'];
    		$product_rating->review = $data['review'];
    		$product_rating->status = 1;
    		$product_rating->save();
    		
    		return redirect()->back();
    	}
    }
}
