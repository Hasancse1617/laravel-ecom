<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Cart;
use Session;
use Auth;
use DB;
use Str;
use Hash;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function login()
    {
    	return view('front.users.login');
    }

    public function register()
    {
    	return view('front.users.register');
    }

    public function reloadCaptcha(Request $request)
    {
    	return response()->json(['captcha'=> captcha_img()]);
    }

    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // Check if User already exists
            $userCount = User::where('email',$data['email'])->count();
            if ($userCount > 0) {
                $message = "Email already exists";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            else {
                //Vallidation
                $request->validate([
                    'fname' => 'required',
                    'lname' => 'required',
                    'dname' => 'required|string|max:255|unique:users|regex:/^\S*$/u',
                    'mobile' => 'required',
                    'email' => 'required|email',
                    'captcha' => 'required|captcha'
                ]);
                //Register the User
                $user = new User();
                $user->fname = $data['fname'];
                $user->lname = $data['lname'];
                $user->dname = $data['dname'];
                $user->email = $data['email'];
                $user->mobile = $data['mobile'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();
                
                // Send Confirmation Email
                $email = $data['email'];
                $messageData = [
                   'email' => $data['email'],
                   'name'  => $data['fname'],
                   'code'  => base64_encode($data['email'])
                ];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                   $message->to($email)->subject('Confirm your E-commerce Website');
                });

                $message = "Please confirm your email to activete your account";
                return redirect('/login')->with('error_message',$message);

                // if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                    
                //     $email = $data['email'];
                //     $messageData = ['name'=>$data['fname'],'mobile'=>$data['mobile'],'email'=>$data['email']];
                //     Mail::send('emails.register',$messageData,function($message) use($email){
                //         $message->to($email)->subject('Welcome to E-com Website');
                //     });

                //     return redirect('/');
                // }

            }
        }
    }

    public function checkEmail(Request $request)
    {
        $data = $request->all();
        $emailCount = User::where('email',$data['email'])->count();
        if ($emailCount > 0) {
            return "false";
        }else {
            return "true";
        }
    }
    
    public function loginUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $remember_me  = ( !empty( $request->remember_me ) )? true : false;
            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                
                //Check Email Activated or not
                $userStatus = User::where('email',$data['email'])->first();
                if ($userStatus->status == 0) {
                    Auth::logout();
                    $message = "Your account is not activeted yet! Please confirm your email to activete!";
                    Session::flash('error_message',$message);
                    return redirect()->back();
                }

                //Update User Cart with user id
                if (!empty(Session::get('session_id'))) {
                    $user_id = Auth::user()->id;
                    $session_id = Session::get('session_id');
                    Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
                }

                $user = User::where(["email" => $data['email']])->first();
                Auth::login($user, $remember_me);
                return redirect('/');
            }else {
                $message = "Invalid Username or Password";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
        }
    }
    public function confirmAccount($email)
    {
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if ($userCount > 0) {
            $userDetails = User::where('email',$email)->first();
            if ($userDetails->status == 1) {
                $message = "Your Email account is already activeted. Please login...";
                return redirect('/login')->with('error_message',$message);
            }else {
                //Update User Status
                User::where('email',$email)->update(['status'=>1]);
                //Send Register Email
                $messageData = ['name'=>$userDetails['fname'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                Mail::send('emails.register',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to E-com Website');
                });
                $message = "Your Email is activated.You can login now..";
                Session::flash('success_message',$message);
                return redirect('/login');
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    //Forgot Password
    public function forgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);
             
            $data = $request->all(); 

            $token = Str::random(60);
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );
            $email = $data['email'];
            $messageData = ['token'=>$token];
            Mail::send('emails.forgot_password',$messageData,function($message) use($email){
                $message->to($email)->subject('Welcome to E-com Website');
            });

            return redirect()->back()->with('success_message','We have e-mailed your password reset link!');

        }
        return view('front.users.forgot_password');
    }

    public function resetPassword(Request $request, $token=null)
    {
        if ($request->isMethod('post')) {
            
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',

            ]);

            $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

            if(!$updatePassword){
                return back()->withInput()->with('error_message', 'Invalid token!');
            }
            $user = User::where('email', $request->email)
                          ->update(['password' => Hash::make($request->password)]);

              DB::table('password_resets')->where(['email'=> $request->email])->delete();

              return redirect('/login')->with('success_message', 'Your password has been changed!');

        }
        return view('front.users.reset_password')->with(compact('token'));
    }
    //End forgot password

    public function account()
    {
        return view('front.users.account');
    }
    public function myOrder()
    {
        return view('front.users.account');
    }
    public function checkPassword(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $checkPassword = User::select('password')->where('id',$user_id)->first();
            if (Hash::check($data['current_pwd'],$checkPassword->password)) {
                return "true";
            }else {
                return "false";
            }
        }
        
    }
    public function updateDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->dname = $data['dname'];
            $user->password = Hash::make($data['new_password']);
            $user->save();
            $tab = "account-detail";
            $message="Details updated successfully";
            Session::flash('success_message',$message);
            return redirect('/account#account-detail')->with(compact('tab'));
        }
    }
}
