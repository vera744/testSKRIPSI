<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\temp;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class manageGadaiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $temps = DB::table('temp')->get();

        return view('admin.manageGadai.index')->with('temp', $temps);
    }
}
