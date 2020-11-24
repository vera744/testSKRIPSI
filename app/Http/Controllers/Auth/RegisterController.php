<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|min:5',
            'dob' => 'required',
            'nomorHP' => 'required|numeric|min:11',
            'alamat' => 'required|min:10',
            'email' => 'required|email|unique:users',
            'nomorKTP' => 'required|numeric',
            'fotoKTP' => 'required|mimes:jpeg,jpg,png',
            'fotodenganKTP' => 'required|mimes:jpeg,jpg,png',
            'password' => 'required|min:8|alpha_num',
            'password_confirmation' => 'required|same:password'
            ]);
        
       
        // $fotoKTP = $request->fotoKTP;
        // $image = Image::make($fotoKTP);
        // Response::make()$image->encode('jpg');

        // $form_data = array(
        //     'fotoKTP' => $image
        // );

        // Images::create($form_data);

            
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = User::count()."_".$data['fotoKTP']->getClientOriginalName();
        $image2 = User::count()."_".$data['fotodenganKTP']->getClientOriginalName();
        $data['fotoKTP']->move('storage/images', $image);
        $data['fotodenganKTP']->move('storage/images', $image2);
    
        return User::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'nomorHP' => $data['nomorHP'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'nomorKTP' => $data['nomorKTP'],
            'fotoKTP' => $image,
            'fotodenganKTP' => $image2,
            'password' => Hash::make($data['password']),
            'role' => 'member'
        ]);
    

        }       
}
