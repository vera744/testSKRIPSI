<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Rules\CurrentPassword;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

use Validator;
use Redirect;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Crypt;
use profile;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $userLogin = auth()->User()->id;
        $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();

        return view('profile')->with('users', $user);
    }

    public function update(request $request, $ids) {
          DB::table('users')->where('id',"=",$ids)->update(['alamat'=> $request->input('alamat')]);
          DB::table('users')->where('id',"=",$ids)->update(['nomorHP'=> $request->input('nomorHP')]);
          DB::table('users')->where('id',"=",$ids)->update(['email'=> $request->input('email')]);

          return redirect('/profile')->with('success','Your data has been updated!');
      }

      
      public function changepassword()
      {
        return view ('profile.changepassword');
      }

      public function updatepassword(request $request)
      {

        $this->validate($request,[
          'current_password'=>['required',new CurrentPassword()],
          'password'=>'bail|required|string|min:8|confirmed',
        ]);
        
        $request->user()->update([
          'password'=>bcrypt($request->password)
        ]);

        // $validation = $request->validated();

        // foreach($validation as $value){
          
        // }

        // $validator = Validator::make($request->all(), $validation);

        // if ($validator->fails())
        // {
        //     return redirect()->route('user.password.edit')->withInput()->withErrors($validator);
        // } 

        $request->user()->update([
        'password' => Hash::make($request->get('password'))
        ]);
        
        return redirect()->route('user.password.edit')->with(['success' => 'Password berhasil diubah!']);
      }

      
  //   public function postChangePassword(Request $request, $ids2){

  //     $userLogin = auth()->User()->id;

  //     $validatedData = $request->validate([
  //       'current-password' => 'required',
  //       'new-password' => 'required|string|confirmed',
  //       'konfirmasi-password' => 'required|string|confirmed',
  //   ]);


  //     if (!(Hash::check($request->get('current-password'), $ids2->password)))
  //     {
  //         return redirect()->back()->with("error","Password lama anda salah");
  //     }

  //     if(strcmp($request->get('current-password'), $request->get('new-password')) == 0)
  //     {
  //         return redirect()->back()->with("error","Password baru anda sama dengan password lama, harap gunakan password lain");
  //     }

  //     if(strcmp($request->get('new-password'), $request->get('konfirm-password')) != 0)
  //     {
  //         return redirect()->back()->with("error","Password baru anda sama dengan password lama, harap gunakan password lain");
  //     }

  
     
  //     $ids2->password = bcrypt($request->get('new-password'));
  //     $user->save();

  //     return redirect()->back()->with("success","Password berhasil diubah");
  // }


}
