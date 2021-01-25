<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Rules\CurrentPassword;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Province;
use App\City;

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
        $user = User::join('provinces', 'provinces.province_id', '=', 'users.provinsi')
        ->join('cities', 'cities.city_id','=', 'users.kota')
        ->select('users.id','name', 'dob', 'nomorHP','alamat','provinces.province_id','cities.city_id','title','cityTitle', 'email', 'password')
        ->where('users.id', "=", $userLogin)
        ->get();

        $provinces = Province::all();
        $cities = City::all();

        return view('profile', compact('user','provinces','cities'));
    }

    public function update(request $request, $ids) {
          DB::table('users')->where('id',"=",$ids)->update(['alamat'=> $request->input('alamat')]);
          DB::table('users')->where('id',"=",$ids)->update(['provinsi'=> $request->input('provinsi')]);
          DB::table('users')->where('id',"=",$ids)->update(['kota'=> $request->input('kota')]);
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

        $request->user()->update([
        'password' => Hash::make($request->get('password'))
        ]);
        
        return redirect()->route('user.password.edit')->with(['success' => 'Kata Sandi berhasil diubah!']);
      }
}
