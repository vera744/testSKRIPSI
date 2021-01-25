<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\Auth\UserActivationEmail;
use App\User;

class userActivationController extends Controller
{
    public function verification(Request $request){
        return view('auth.verification');
    }

    public function postVerification(Request $request){
        $user = User::where('token_activation', $request->otp)->first();

        if($user==null){
            return redirect()->back()->with('error','Kode OTP salah! Silahkan cek lagi email anda dan masukkan kode OTP yang benar!');
        }
        else{
            $user->update([
                'isVerified' => true, 
                'token_activation' => null 
             ]);
            return redirect('login')->with('success','Selamat, akun anda telah aktif!');
        }
    }

    public function postResend(Request $request){
        $this->validates($request);
        $user = User::where('email',$request->email)->first();

        //SEND EMAIL
        if($user==null){
            return redirect()->route('verification')->with('error', 'Email yang anda masukkan tidak terdaftar, mohon cek kembali!');
        }
        else{
            $user->token_activation = str_random(6);
            $user->save();

            event(new UserActivationEmail($user));
    
            return redirect()->route('verification')->with('success','OTP berhasil dikirim ulang! Silahkan cek kembali email anda di "'.$user->email. '"!');
        }
    }

    protected function validates(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|exists:users,email'
        ],[
            'email.exists' => 'Email tidak ditemukan. Silahkan cek kembali!'
        ]);
    }
}
