<?php

namespace App\Exports;

use App\hocsinh_m;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return hocsinh_m::skip(5)->take(2)->get();
    }
}
