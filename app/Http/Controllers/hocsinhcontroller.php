<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hocsinh_m;
use DB;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;


class hocsinhcontroller extends Controller
{
    //
    public function index()
    {

    	$student = hocsinh_m::orderBy('id','DESC')->paginate(3);
    	return view('layout.list_hocsinh',compact('student'));
    }
    // public function search(request $req)
    // {
    //     $search = $req->input('search');
    //     $user = hocsinh_m::with('name',function($query) use $query->where('search','newt_listbox_set_current_by_key(listbox, key)','%'.$search . '%'))
    // }

    public function create()
    {

    	return view('layout.add_hocsinh');
    }
    public function search(Request $rq)
    {
        $search = $rq->get('search');
        
        $student = hocsinh_m::where('name','like','%'.$search.'%')->paginate(3);
        return view('layout.list_hocsinh',compact('student'));
    }
    public function store(Request $req)
    {
    	$student = new hocsinh_m;
        $file = $req->filetest;
        $file->move('upload',$file->getClientOriginalName());
        $student->anh = $file->getClientOriginalName();
    	$student->name = $req->input('name');
    	$student->birth = $req->input('birth');
    	$student->sex = $req->input('sex');
    	$student->address = $req->input('address');
        $student->save();
        return redirect()->route('layout.list_hocsinh');
    }
    public function edit($id)
    {
    	$student = hocsinh_m::find($id);
    	return view('layout.update_hocsinh',compact('student'));
    }
    public function update(Request $req)
    {
    	$student = hocsinh_m::find($req->id);

        $file = $req->filetest;
        if( $req->filetest)
        $file->move('upload',$file->getClientOriginalName());
        if( $req->filetest)
        $student->anh = $file->getClientOriginalName();
        $student->name = $req->input('name');
        $student->birth = $req->input('birth');
        $student->sex = $req->input('sex');
        $student->address = $req->input('address');
    	$student->save();
    	return redirect()->route('layout.list_hocsinh');
    }
    public function delete($id)
    {
    	$student = hocsinh_m::find($id);
    	$student->delete();
    	return redirect()->route('layout.list_hocsinh');
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
   }
    // public function import() 
    // {
    //     Excel::import(new UsersImport, 'users.xlsx');
        
    //     return redirect('/')->with('success', 'All good!');
    // }
    // $files = $request->input('key');
    public function doUpload(Request $request)
    {
        $file = $request->filesTest;

        $file->move('upload', $file->getClientOriginalName());
        Excel::import(new UsersImport, 'upload/'.$file->getClientOriginalName());
        return redirect('hocsinh/danh-sach');

        //hàm sẽ trả về đường dẫn mới của file trên server/
    }
}
