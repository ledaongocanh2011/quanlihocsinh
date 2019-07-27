<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hocsinh_m extends Model
{
    //
    protected $table = 'flights';
    protected $fillable = ['anh','name','birth','sex','address'];
    public $timestamps = false;
    public static function hsSearch($keyword, $paginate){
    	return self::where('name', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
}
