<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EcomController extends Controller
{
    public function index(){
        return view('ecom.index');
    }
}
