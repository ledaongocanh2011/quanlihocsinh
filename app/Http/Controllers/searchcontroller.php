<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hocsinh_m;
use DB;
class searchcontroller extends Controller
{

  public function search(Request $rq)
    {
        $search = $rq->get('search');
        if ($search != NULL) {
            $student = hocsinh_m::hsSearch($search, 3);
        }
        
        // return view('fontend.search')->with(compact('pResult', 'nResult'));
        // $student = hocsinh_m::where('name','like','%'.$search.'%')->paginate(3);
        return view('layout.list_hocsinh',compact('student'));
    }

    public function search(Request $request){
      $keyword = $request->input('search');
      $student = null;
      if($keyword != null){
        $student = hocsinh_m::hsSearch($keyword, 3);
      }
      return view('layout.list_hocsinh',compact('student'));
    }
    //
  // SEARCH CŨ
   // public function getSearch(Request $request)
   //  {
   //      return view('layout.list_hocsinh');
   //  }
   // function getSearchAjax(Request $request)
   //  {
   //      if($request->search)
   //      {
   //          $query = $request->search;
   //          $data = hocsinh_m::where('name', 'LIKE', "%$query%")
   //          ->get();
   //          $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
   //          foreach($data as $row)
   //          {
   //             $output .= '
   //             <li><a href="data/'. $row->id .'">,'.$row->anh.','.$row->name.' , '.$row->birth.' , '.$row->sex.', '.$row->address.'</a></li>
   //             ';
   //          }
   //         $output .= '</ul>';
   //         echo $output;
   //     }
   //  }
  // END SEARCH CŨ
  // search  mới
// public function dataAjaxCountry()
// {
//     echo "<tr><td>asdsad</td></tr>";
// }
  

  // end search mới

}
