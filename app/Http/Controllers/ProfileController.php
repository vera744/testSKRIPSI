<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Flash;
use Illuminate\Support\Facades\Crypt;
use profile;

class ProfileController extends Controller
{
    //
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

    protected function validator(array $data)
    {

      return Validator::make($data, [
       
        'nomorHP' => 'required|numeric|min:11',
        'alamat' => 'required|min:10',
        'email' => 'required|email|unique:users',

        ]);

    }

    public function update(Request $request,$ids) {

        /**
           * fetching the user model
           */

        
      
          /**
           * Validate request/input 
           **/
       
      
          /**
           * storing the input fields name & email in variable $input
           * type array
           **/
      
            
      
          /**
           * Accessing the update method and passing in $input array of data
           **/
          DB::table('users')->where('id',"=",$ids)->update(['alamat'=> $request->input('alamat')]);
          DB::table('users')->where('id',"=",$ids)->update(['nomorHP'=> $request->input('nomorHP')]);
          DB::table('users')->where('id',"=",$ids)->update(['email'=> $request->input('email')]);

          //   $user->name = $request->input('nomorHP');
        //   $user->email = $request->input('email');
        //   $user->alamat = $request->input('alamat');
          

        //   $user->save();
          // Flash::message('Your account has been updated!');
          /**
           * after everything is done return them pack to /profile/ uri
           **/
        //   $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        //   ->where('id', "=", $ids)
        //   ->get();
  
        //   return view('profile')->with('users', $user);

        return redirect('/profile')->with('success','Your data has been updated!');
      }

      
      public function changepassword()
      {
          $userLogin = auth()->User()->id;
          $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
          ->where('id', "=", $userLogin)
          ->get();
  
          return view('changepassword')->with('users', $user);
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
