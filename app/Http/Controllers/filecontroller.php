<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filecontroller extends Controller
{
    //
    public function file()
    {
    	return view('layout.add_hocsinh');
    }
    public function uploadfile()
    {
    	// code xử lí upload file
    	$file = $Request->filetest;
    	$file->move('upload'$file->getClientOrginalName())
    }
}
