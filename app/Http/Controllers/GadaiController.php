<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GadaiController extends Controller
{
    public function index(){
        return view('gadai.index');
    }
}
