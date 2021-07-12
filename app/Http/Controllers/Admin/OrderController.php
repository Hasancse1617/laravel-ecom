<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\OrderStatus;
use App\OrdersLog;
use App\Order;
use App\User;
use Session;
use Auth;
use PDF;
use App\Sms;

class OrderController extends Controller
{
    public function orders()
    {
    	Session::put('page','orders');
    	$orders = Order::with('orders_products')->get()->toArray();
    	return view('admin.orders.orders')->with(compact('orders'));
    }
    public function orderDetails($id)
    {
    	$orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
    	$userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
    	$orderStatuses = OrderStatus::where('status',1)->get()->toArray();
        $orderLogs = OrdersLog::where('order_id',$id)->orderBy('id','desc')->get()->toArray();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses','orderLogs'));
    }

    public function updatOrderStatus(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		//Update Order Status
    		Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
    		Session::flash('success_message','Order Status has been updated successfully');
    		
            //Update Courier Name and Tracking Number
            if (!empty($data['courier_name']) && !empty($data['tracking_number'])) {
                Order::where('id',$data['order_id'])->update(['courier_name'=>$data['courier_name'],'tracking_number'=>$data['tracking_number']]);
            }
            //delivery Details
            $deliverydetails = Order::select('fname','mobile','email')->where('id',$data['order_id'])->first()->toArray();

            //Send Order Sms
            $message = "Dear Customer, your order #".$data['order_id']." status has been updated to ".$data['order_status']." placed with ecom.com.";
            $mobile = $deliverydetails['mobile'];
            Sms::sendSms($message,$mobile);
            //Send Order Email
            $orderDetails = Order::with('orders_products')->where('id',$data['order_id'])->first()->toArray();
            $email = $deliverydetails['email'];
            $messageData = [
                'email'       =>$email,
                'name'        =>$deliverydetails['fname'],
                'order_id'    =>$data['order_id'],
                'order_status'=>$data['order_status'],
                'courier_name'=>$data['courier_name'],
                'tracking_number'=>$data['tracking_number'],
                'orderDetails'=>$orderDetails
            ];

            Mail::send('emails.order_status',$messageData,function($message) use($email){
                 $message->to($email)->subject('Order Status Updated - Hasan.com');
            });
           
           //Update Order Log
            $log = new OrdersLog;
            $log->order_id = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();
            return redirect()->back();
    	}  
    }
    
    public function viewOrderInvoice($id)
    {
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        return view('admin.orders.order_invoice')->with(compact('orderDetails','userDetails'));
    }

    public function printPDFInvoice($id)
    {
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        
        $data['orderDetails'] = $orderDetails;
        $data['userDetails'] = $userDetails;
        $pdf = PDF::loadView('admin.orders.order_pdf_invoice', $data);
        return $pdf->stream('invoice.pdf');
    }
}
