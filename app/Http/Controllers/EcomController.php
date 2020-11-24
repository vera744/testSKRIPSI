<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EcomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('ecom.index');
    }
}
