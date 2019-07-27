<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hocsinh_m;

class printcontroller extends Controller
{
    //
    public function index()
    {
    	return view('layout.list_hocsinh');
    }
    public function printview()
    {
    	$product = hocsinh_m::all();
    	return view('printview',compact('product'));
    }
}
