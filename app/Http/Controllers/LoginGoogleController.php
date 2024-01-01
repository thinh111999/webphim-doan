<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

  

class LoginGoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user(); //mạng xã hội là google

            $finduser = User::where('google_id', $user->id)->first(); //tìm kiếm xem tài khoản đã có trong DB chưa
            if($finduser){ //nếu có
                Auth::login($finduser); //login ngay lập tức
                return redirect()->intended('/');
            }else{ //nếu không có
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->google_id,
                    'password' => encrypt('123456789') //trên 8 ký tự
                ]);
                //login với acc mới
                Auth::login($newUser);
                return redirect()->intended('/');
            }            
        } catch (Exception $e) {
            // dd($e->getMessage());
        }
    }
    public function logout_home(){
        Auth::logout();
        return redirect()->back();
    }
}
