<?php

namespace App\Imports;

use App\hocsinh_m;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new hocsinh_m([
            'anh'   => $row[0],
            'name'  => $row[1], 
            'birth' => $row[2], 
            'sex'   => $row[3], 
            'address'=> $row[4], 
            // 'password' => Hash::make($row[2]),
        ]);
    }
}
