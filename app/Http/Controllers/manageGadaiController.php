<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\temp;
use App\product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class manageGadaiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $temp = temp::paginate(5);

        return view('admin.manageGadai.index')->with('temp', $temp);
    }

    public function update(Request $request, $id){

    }
}
