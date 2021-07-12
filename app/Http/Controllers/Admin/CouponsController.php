<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;
use App\Section;
use App\User;
use Str;
use Session;

class CouponsController extends Controller
{
    public function coupons()
    {
    	$coupons = Coupon::orderBy('id','desc')->get()->toArray();
    	return view('admin.coupons.coupons')->with(compact('coupons'));
    }

    public function updateCouponStatus(Request $request)
    {
    	if ($request->ajax()) {
    		$data = $request->all();
    		
            if ($data['status'] == "Active") {
            	$status = 0;
            }
            else{
            	$status = 1;
            }
            Coupon::where('id', $data['coupon_id'])->update(['status'=>$status]);

            return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);
    	}
    }

    public function addEditCoupon(Request $request, $id=null)
    {
    	if ($id=="") {
    		//Add COupon
    		$coupon = new Coupon();
    		$selCats = array();
    		$selUsers = array();
    		$title = "Add Coupon";
    		$message = "Coupon added successfully";
    	}else {
    		//Edit Coupon
    		$coupon = Coupon::find($id);
    		$selCats = explode(',', $coupon['categories']);
    		$selUsers = explode(',', $coupon['users']);
    		$title = "Edit Coupon";
    		$message = "Coupon updated successfully";
    	}
    	if ($request->isMethod('post')) {
    		$data = $request->all();
            // dd($data);
    		if (isset($data['users'])) {
    			$users = implode(',', $data['users']);
    		}else {
    			$users = "";
    		}

    		if (isset($data['categories'])) {
    			$categories = implode(',', $data['categories']);
    		}
            if ($id == "") {
                if ($data['coupon_option'] == "Autometic") {
                    $coupon_code = Str::random(8);
                }
                else {
                    $coupon_code = $data['coupon_code'];
                }
            }else {
                $coupon_code = $data['coupon_code'];
            }
    		
    		$coupon->coupon_option = $data['coupon_option'];
    		$coupon->coupon_code = $coupon_code;
    		$coupon->categories = $categories;
    		$coupon->users = $users;
    		$coupon->coupon_type = $data['coupon_type'];
    		$coupon->amount_type = $data['amount_type'];
    		$coupon->amount = $data['amount'];
    		$coupon->expiry_date = date('Y-m-d',strtotime($data['expiry_date']));
    		$coupon->status = 1;
    		$coupon->save();

    		Session::flash('success_message',$message);
    		return redirect('admin/coupons');
    	}
    	//Sections with Categories and subcategories
    	$categories  = Section::with('categories')->get()->toArray();
    	//users
    	$users = User::select('email')->where('status',1)->get()->toArray();

    	return view('admin.coupons.add_edit_coupon')->with(compact('title','coupon','categories','users','selCats','selUsers'));
    }

    public function deleteCoupon($id)
    {
    	Coupon::where('id',$id)->delete();
    	$message = "Coupon has been deleted successfully";
    	Session::flash('success_message',$message);
    	return redirect()->back();
    }
}
