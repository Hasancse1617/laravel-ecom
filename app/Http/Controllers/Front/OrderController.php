<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function oderDetails(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		$orderDetails = Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
    		return response()->json([
                'view'=>(String)View::make('front.orders.order_details')->with(compact('orderDetails'))
            ]);
    	}
    }
}
