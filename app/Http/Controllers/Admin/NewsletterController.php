<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsletterSubscriber;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscriberExport;
use Session;

class NewsletterController extends Controller
{
    public function subscriber()
    {   
        Session::put('page', 'subscriber');
    	$subscribers = NewsletterSubscriber::orderBy('id','desc')->get();
    	return view('admin.newsletter.newsletter')->with(compact('subscribers'));
    }
    public function updateSubscriberStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		
            if ($data['status'] == "Active") {
            	$status = 0;
            }
            else{
            	$status = 1;
            }
            NewsletterSubscriber::where('id', $data['subscriber_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'subscriber_id'=>$data['subscriber_id']]);
    	}
    }
    public function deleteSubscriber($id)
    {
    	NewsletterSubscriber::where('id',$id)->delete();
    	return redirect()->back()->with('success_message','Subscriber has been deleted Successfully');
    }
    public function subscriberExcelExport()
    {
    	return Excel::download(new SubscriberExport, 'subscriber.xlsx');
    }
}
