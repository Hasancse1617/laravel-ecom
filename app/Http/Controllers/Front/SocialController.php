<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;

class SocialController extends Controller
{
     public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            // dd($user);
            $isUser = User::where('email', $user->email)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'fname' => $user->name,
                    'lname' => '',
                    'dname' => '',
                    'mobile' => '',
                    'status' => 1,
                    'email' => $user->email,
                    'password' => encrypt('admin@123')
                ]);
                // dd($createUser);
                Auth::login($createUser);
                return redirect('/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

     public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
    
            $user = Socialite::driver('google')->user();
            // dd($user);
            $isUser = User::where('email', $user->email)->first();
     
            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'fname' => $user->name,
                    'lname' => '',
                    'dname' => '',
                    'mobile' => '',
                    'status' => 1,
                    'email' => $user->email,
                    'password' => encrypt('admin@123')
                ]);
                // dd($createUser);
                Auth::login($createUser);
                return redirect('/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
