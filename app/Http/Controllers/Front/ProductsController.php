<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\ProductsAttribute;
use App\DeliveryAddress;
use App\Category;
use App\Product;
use App\User;
use App\Cart;
use App\Coupon;
use App\Country;
use App\Order;
use App\OrdersProduct;
use App\Sms;
use Session;
use Auth;
use DB;

class ProductsController extends Controller
{
    public function listing(Request $request)
    {
    	Session::put('page', 'listing');
        Paginator::useBootstrap();
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);
            $url = $data['url'];
            $categoryCount = Category::where('url',$url)->where('status',1)->count();
            if ($categoryCount > 0){

                $categoryDetails = Category::catDetails($url);
                //dd($categoryDetails);
                $categoryProducts = Product::whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
                
                //If Price filter is selected
                if (isset($data['minprice']) && isset($data['maxprice'])) {
                    $categoryProducts->where('product_price','>=', $data['minprice']);
                    $categoryProducts->where('product_price','<=', $data['maxprice']);
                }
                //If fabric filter is selected
                if (isset($data['fabric']) && !empty($data['fabric'])) {
                    $categoryProducts->whereIn('products.fabric', $data['fabric']);
                }
                //If sleeve filter is selected
                if (isset($data['sleeve']) && !empty($data['sleeve'])) {
                    $categoryProducts->whereIn('products.sleeve', $data['sleeve']);
                }
                //If pattern filter is selected
                if (isset($data['pattern']) && !empty($data['pattern'])) {
                    $categoryProducts->whereIn('products.pattern', $data['pattern']);
                }
                //If fit filter is selected
                if (isset($data['fit']) && !empty($data['fit'])) {
                    $categoryProducts->whereIn('products.fit', $data['fit']);
                }
                //If occassion filter is selected
                if (isset($data['occassion']) && !empty($data['occassion'])) {
                    $categoryProducts->whereIn('products.occasion', $data['occassion']);
                }
                //If Sorting filter is selected
                if (isset($data['sort']) && !empty($data['sort'])) {
                    if ($data['sort']=="product_latest") {
                        $categoryProducts->orderBy('id','Desc');
                    }
                    else if ($data['sort']=="product_name_a_z") {
                        $categoryProducts->orderBy('product_name','Asc');
                    }
                    else if ($data['sort']=="product_name_z_a") {
                        $categoryProducts->orderBy('product_name','Desc');
                    }
                    else if ($data['sort']=="price_lowest") {
                        $categoryProducts->orderBy('product_price','Asc');
                    }
                    else if ($data['sort']=="price_highest") {
                        $categoryProducts->orderBy('product_price','Desc');
                    }
                }
    
                $categoryProducts = $categoryProducts->paginate($data['show']);
                
                if ($data['grid_list'] == 'grid') {
                    return view('front.products.ajax_products_listing')->with(compact('categoryDetails','categoryProducts','url'));
                }else{
                    return view('front.products.ajax_products_listing_list')->with(compact('categoryDetails','categoryProducts','url'));
                }
                
            
            }
            else {
                abort(404);
            }
        }
        else {
            $url = Route::getFacadeRoot()->current()->uri();
            $categoryCount = Category::where('url',$url)->where('status',1)->count();
            if ($categoryCount>0) {
                $categoryDetails = Category::catDetails($url);
                //dd($categoryDetails);
                $categoryProducts = Product::whereIn('category_id',$categoryDetails['catIds'])->where('status',1);
                $categoryProducts = $categoryProducts->paginate(2);
                //dd($categoryProducts);
                // product Filters
                 $productFilters = Product::productFilters();
                 $fabricArray = $productFilters['fabricArray'];
                 $sleeveArray = $productFilters['sleeveArray'];
                 $patternArray = $productFilters['patternArray'];
                 $fitArray = $productFilters['fitArray'];
                 $occasionArray = $productFilters['occassionArray'];
                 $page_name = "listing";

                return view('front.products.listing')->with(compact('categoryDetails','categoryProducts','url','fabricArray','sleeveArray','patternArray','fitArray','occasionArray','page_name'));
            }else {
                abort(404);
            }
        }

    }

    public function detail($id)
    {
        $productDetails = Product::with(['category','brand','attributes'=>function($query){$query->where('status',1);},'images'])->find($id)->toArray();
        $totalstock = ProductsAttribute::where('product_id',$id)->sum('stock');
        $relatedProducts = Product::where('category_id',$productDetails['category']['id'])->where('id','!=',$id)->limit(3)->inRandomOrder()->get()->toArray();
        return view('front.products.detail')->with(compact('productDetails','totalstock','relatedProducts'));
    }

    public function getProductPrice(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $getDiscountAttrprice = Product::getDiscountAttrprice($data['product_id'],$data['size']);
            return $getDiscountAttrprice;
        }
    }

    public function addtocart(Request $request)
    {
        if ($request->isMethod('post')) {
            Session::put('couponAmount',0);
            Session::put('couponCode',0);
            $data = $request->all();
            $getProductStock = ProductsAttribute::where('product_id',$data['product_id'])->where('size',$data['size'])->first()->toArray();
            
            //Check Product Stock is available or not
            if ($getProductStock['stock'] < $data['quantity']) {
                $message = "Required Quantity is not available";
                Session::flash('error_message',$message);
                return redirect()->back();
            }

            //Generate session ID If not exists
            $session_id = Session::get('session_id');
            if (empty($session_id)) {
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }

            //Check Product if already exists in Cart
            if (Auth::check()) {
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>Auth::user()->id])->count();
            }else {
                $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>Session::get('session_id')])->count();
            }

            if ($countProducts > 0) {
                $message = "Product is already exists in Cart";
                Session::flash('error_message',$message);
                return redirect()->back();
            }

            if (Auth::check()) {
                $user_id = Auth::user()->id;
            }else {
                $user_id = 0;
            }

            //Save Product in Cart
            $cart = new Cart();
            $cart->session_id = $session_id;
            $cart->product_id = $data['product_id'];
            $cart->user_id = $user_id;
            $cart->size = $data['size'];
            $cart->quantity = $data['quantity'];
            $cart->save();
            $message = "Product has been added successfully";
            Session::flash('success_message',$message);
            return redirect('/cart');

        }
    }

    public function cart()
    {
        $userCartItems = Cart::userCartItems();
        return view('front.products.cart')->with(compact('userCartItems'));
    }

    public function updateCartItemQty(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //Add Coupon Code Session Variables
            Session::put('couponAmount',0);
            Session::put('couponCode',0);
            //Cart Details
            $cartDetails = Cart::find($data['cartid']);
            //Available Stock
            $availableStock = ProductsAttribute::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray();
            if ($data['qty'] > $availableStock['stock']) {
                $userCartItems = Cart::userCartItems();
                return response()->json([
                   'status'=>false,
                   'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems')),
                   'mini_cart_view'=>(String)View::make('layouts.front_layout.mini_cart_items')->with(compact('userCartItems'))
                ]);
            }

            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();
            return response()->json([
                'status'=>true,
                'totalCartItems'=>$totalCartItems,
                'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems')),
                'mini_cart_view'=>(String)View::make('layouts.front_layout.mini_cart_items')->with(compact('userCartItems'))
            ]);
  
        }
    }

    public function deleteCartItem(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //Add Coupon Code Session Variables
            Session::put('couponAmount',0);
            Session::put('couponCode',0);
            Cart::where('id',$data['cartid'])->delete();
            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();
            return response()->json([
                'totalCartItems'=>$totalCartItems,
                'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
            ]);
        }
    }

    public function applyCoupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $userCartItems = Cart::userCartItems();
            $totalCartItems = totalCartItems();

            $couponCount = Coupon::where('coupon_code',$data['coupon'])->count();
            if ($couponCount == 0) {
                return response()->json([
                'status'=>false,
                'message'=>'This coupon is not valid',
                'totalCartItems'=>$totalCartItems,
                'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
              ]);
            }else{
                $couponDetails = Coupon::where('coupon_code',$data['coupon'])->first();
                //Check Coupon Expiry Date
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');
                if ($expiry_date < $current_date) {
                    $message = "This coupon is expired!";
                }
                
                //Check Coupon Status
                if ($couponDetails->status == 0 ) {
                    $message = "This coupon is not active";
                }
                 
                //check Category
                $catArr = explode(',',$couponDetails->categories);

                //Check User Coupon Only
                if (!empty($couponDetails->users)) {
                    
                    $userArr = explode(',',$couponDetails->users);
                    foreach ($userArr as $key=> $user) {
                        $getUserId = User::select('id')->where('email',$user)->first()->toArray();
                        $userId[] = $getUserId['id'];
                    }

                }
                
                $total_amount = 0;
                $userCartItems = Cart::userCartItems();
                foreach ($userCartItems as $item) {
                    if (!in_array($item['product']['category_id'], $catArr)) {
                        $message = 'This coupon is not one of the selected products';
                    }
                    if (!empty($couponDetails->users)) {
                        if (!in_array($item['user_id'], $userId)) {
                            $message = 'This coupon is not for you!';
                        }
                    }
                    $attrPrice = Product::getDiscountAttrprice($item['product_id'],$item['size']);
                    $total_amount = $total_amount + ($attrPrice['final_price'] * $item['quantity']);
                }

                if (isset($message)) {
                    return response()->json([
                        'status'=>false,
                        'message'=>$message,
                        'totalCartItems'=>$totalCartItems,
                        'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems'))
                    ]);
                }
                else {
                    if ($couponDetails->amount_type == "Fixed") {
                        $couponAmount = $couponDetails->amount;
                    }else {
                        $couponAmount = $total_amount * ($couponDetails->amount/100);
                    }
                    $grandTotal = $total_amount - $couponAmount;
                    //Add Coupon Code Session Variables
                    Session::put('couponAmount',$couponAmount);
                    Session::put('couponCode',$data['coupon']);
                    $totalCartItems = totalCartItems();
                    $message = "Coupon Code successfully applied";
                    return response()->json([
                        'status'=>true,
                        'couponAmount'=>$couponAmount,
                        'grandTotal'=>$grandTotal,
                        'message'=>$message,
                        'totalCartItems'=>$totalCartItems,
                        'view'=>(String)View::make('front.products.cart_items')->with(compact('userCartItems')),
                        'checkout_items'=>(String)View::make('front.products.checkout_items')->with(compact('userCartItems'))
                    ]);

                }
            }
        }
    }

    public function checkout(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            //Update User Details
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->address = $request->address;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->district = $request->district;
            $user->pincode = $request->zipcode;
            $user->save();

            if ($data['payment_gateway'] == 'COD') {
                $payment_method = "COD";
            }

            if ($request->ship_address == 'on') {
                $validated = $request->validate([
                    'shipping_fname' => 'required',
                    'shipping_lname' => 'required',
                    'shipping_address' => 'required',
                    'shipping_country' => 'required',
                    'shipping_city' => 'required',
                    'shipping_district' => 'required',
                    'shipping_zipcode' => 'required',
                ]);
                //Update Delivery Address
                $delivery_address_count = DeliveryAddress::where('user_id',Auth::user()->id)->count();
                // dd($delivery_address_count);
                if ($delivery_address_count > 0) {
                    $id = Auth::user()->id;
                    $delivery_address = DeliveryAddress::find($id);
                }else {
                    $delivery_address = new DeliveryAddress();
                }

                $delivery_address->user_id = Auth::user()->id;
                $delivery_address->shipping_fname = $data['shipping_fname'];
                $delivery_address->shipping_lname = $data['shipping_lname'];
                $delivery_address->shipping_address = $data['shipping_address'];
                $delivery_address->shipping_city = $data['shipping_city'];
                $delivery_address->shipping_district = $data['shipping_district'];
                $delivery_address->shipping_country = $data['shipping_country'];
                $delivery_address->shipping_zipcode = $data['shipping_zipcode'];
                $delivery_address->shipping_mobile = $data['shipping_mobile'];
                $delivery_address->save();

                DB::beginTransaction();

                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->fname = $data['shipping_fname'];
                $order->lname = $data['shipping_lname'];
                $order->address = $data['shipping_address'];
                $order->city = $data['shipping_city'];
                $order->district = $data['shipping_district'];
                $order->country = $data['shipping_country'];
                $order->zipcode = $data['shipping_zipcode'];
                $order->mobile = $data['shipping_mobile'];
                $order->email = $data['email'];
                $order->shipping_charge = 0;
                $order->coupon_code = Session::get('couponCode');
                $order->coupon_amount = Session::get('couponAmount');
                $order->order_status = 'New';
                $order->payment_method = $payment_method;
                $order->payment_gateway = $data['payment_gateway'];
                $order->grand_total = Session::get('grand_total');
                $order->save();
            }
            else {
                
                DB::beginTransaction();

                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->fname = $data['fname'];
                $order->lname = $data['lname'];
                $order->address = $data['address'];
                $order->city = $data['city'];
                $order->district = $data['district'];
                $order->country = $data['country'];
                $order->zipcode = $data['zipcode'];
                $order->mobile = $data['mobile'];
                $order->email = $data['email'];
                $order->shipping_charge = 0;
                $order->coupon_code = Session::get('couponCode');
                $order->coupon_amount = Session::get('couponAmount');
                $order->order_status = 'New';
                $order->payment_method = $payment_method;
                $order->payment_gateway = $data['payment_gateway'];
                $order->grand_total = Session::get('grand_total');
                $order->save();

            }

            //Get Last Order Id
            $order_id = DB::getPdo()->lastInsertId();

            //Get User Cart Items
            $cartItems = Cart::where('user_id',Auth::user()->id)->get()->toArray();
            foreach ($cartItems as $key => $item) {
                $cartItem = new OrdersProduct;
                $cartItem->order_id = $order_id;
                $cartItem->user_id = Auth::user()->id;

                $getProductDetail = Product::select('product_code','product_name','product_color')->where('id',$item['product_id'])->first();
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_code = $getProductDetail['product_code'];
                $cartItem->product_name = $getProductDetail['product_name'];
                $cartItem->product_color = $getProductDetail['product_color'];
                $cartItem->product_size = $item['size'];
                $getDiscountAttrprice = Product::getDiscountAttrprice($item['product_id'],$item['size']);
                $cartItem->product_price = $getDiscountAttrprice['final_price'];
                $cartItem->product_qty = $item['quantity'];
                $cartItem->save();
            }

            Session::put('couponAmount',0);
            Session::put('couponCode',0);
            
            //Insert Order Id in Session Variable
            Session::put('order_id',$order_id);
        
            DB::commit();
            if ($data['payment_gateway'] == 'COD') {
                
                //Send Order Sms
                $message = "Dear Customer, your order id ".$order_id." has been successfully placed with hasan.com. We will intimate you once your order is shipped";
                $mobile = Auth::user()->mobile;
                Sms::sendSms($message,$mobile);
                
                $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();

                //Send Order Email
                $email = Auth::user()->email;
                $messageData = [
                    'email'       =>$email,
                    'name'        =>Auth::user()->name,
                    'order_id'    =>$order_id,
                    'orderDetails'=>$orderDetails
                ];

                Mail::send('emails.order',$messageData,function($message) use($email){
                     $message->to($email)->subject('Order Placed - Hasan.com');
                });

                return redirect('/thanks');
            }else {
                echo 'Coming soon';
            }
        }

        $userDetails = User::where('id',Auth::user()->id)->first();

        $delivery = DeliveryAddress::where('user_id', Auth::user()->id)->first();

        $countries = Country::where('status',1)->get();
        $userCartItems = Cart::userCartItems();
        if (empty($userCartItems)) {
            $message = "Your Cart is Empty";
            return redirect()->back()->with('error_message',$message);
        }
        return view('front.products.checkout')->with(compact('userDetails','countries','userCartItems','delivery'));
    }

    public function thanks()
    {
        if (Session::has('order_id')) {
            //Empty the User Cart Table
            Cart::where('user_id',Auth::user()->id)->delete();
            return view('front.products.thanks');
        }else {
            return redirect('/cart');
        }
        
    }
}
