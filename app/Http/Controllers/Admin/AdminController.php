<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Admin;
use Hash;
use Image;

class AdminController extends Controller
{
    public function dashboard()
    {
    	Session::put('page', 'dashboard');
        return view('admin.admin_dashboard');
    }
    public function login(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$data = $request->all();

            $validatedData = $request->validate([
			    'email' => ['required', 'email', 'max:255'],
			    'password' => ['required'],
		    ]);

    		if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])) {
    			return redirect('admin/dashboard');
    		}
    		else{
    			Session::flash('error_message', 'Invalid Email or Password');
    			return redirect()->back();
    		}
    	}
    	return view('admin.admin_login');
    }

    public function settings()
    {
        Session::put('page', 'settings');
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings')->with(compact('adminDetails'));
    }

    public function check_cur_pass(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo 'True';
        }
        else{
            echo 'False';
        }
    }

    public function update_current_pwd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password has been Updated seccessfully');
                }
                else{
                    Session::flash('error_message', 'Password and Confirm Password do not matched');
                    return redirect()->back();
                }
            }
            else{
                Session::flash('error_message', 'Your current password is incorrect');
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function admin_details()
    {
        Session::put('page', 'admin-details');
        return view('admin.admin_details');
    }

    public function update_admin_details(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $admin = $request->all();

            $rules=[
              'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
              'admin_mobile'=> 'required|numeric',
              'admin_image' => 'image',
            ];
            $custom_msg = [
              'admin_name.required' => 'Name is required',
              'admin_name.regex' => 'Valid name is required',
              'admin_mobile.required'=> 'Moblie number is required',
              'admin_mobile.numeric' => 'Valid number is required',
              'admin_image.image' => 'Valid image is required',
            ];
            $this->validate($request,$rules,$custom_msg);

            $id = Auth::guard('admin')->user()->id;
            $data = Admin::find($id);

            if ($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    @unlink(public_path('images/admin_images/admin_photos/'.$data->image));
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                   //Save Image with folder
                   Image::make($image_tmp)->save($imagePath);
                   $data->image = $imageName;
                }
            }

            $data->name = $admin['admin_name'];
            $data->mobile = $admin['admin_mobile'];
            $data->save();
            Session::flash('success_message', 'Admin Details Updated Successfully');
            return redirect('/admin/admin-details');

        }
        return view('admin.update_admin_details');
    }
    public function users()
    {
        Session::put('page', 'users');
        $users = Admin::all();
        return view('admin.users.view-user')->with(compact('users'));
    }

    public function add_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email' => ['required', 'unique:admins', 'max:255']
            ]);
            $code = rand(100000,999999);
            $user = new Admin();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->type = $request->type;
            $user->code = $code;
            $user->password = Hash::make($code);
            $user->status = 1;
            $user->save();
            $message = "Data added successfully";
            return redirect('/admin/users')->with('success_message',$message);
        }
        return view('admin.users.add-user');
    }

    public function delete_user($id)
    {
        $user = Admin::find($id);
        $user->delete();
        $message = "Data deleted successfully";
        return redirect('/admin/users')->with('success_message',$message);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
