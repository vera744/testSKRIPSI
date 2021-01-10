<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\GadaiEmail;

class EmailController extends Controller
{
    public function index(){
        Mail::to(auth()->User()->email)->send(new GadaiEmail());
        return "Email telah dikirim";
 
    }
}
