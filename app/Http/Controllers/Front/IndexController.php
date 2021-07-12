<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Session;

class IndexController extends Controller
{
    public function index()
    {
    	Session::put('page', 'index');
    	$featuredItemCount = Product::where('is_featured','Yes')->where('status',1)->count();
    	$featureItems = Product::where('is_featured','Yes')->where('status',1)->get()->toArray();
    	return view('front.index')->with(compact('featureItems','featuredItemCount'));
    }
}
