<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hocsinh_m;
use Yajra\Datatables\Datatables;

class datatablecontroller extends Controller
{
    //hiển thị giao diện người dùng
    public function getindex()
    {
    	return view('datatable');
    }
    // xử lí bằng ajax
    public function anydata()
    {
    	$student = hocsinh_m::query();
    	return Datatables::of($student)->editColumn('anh',function($student){
    		return '<img src="' . asset('upload/').'/'.$student->anh. '" width="200" height="100" alt="" class="img-circle img-avatar-list">';
    	})->rawColumns(['anh'])->make(true);
    }
}
