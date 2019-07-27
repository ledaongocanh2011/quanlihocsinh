<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|()
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'hocsinh'],function()
{
	Route::get('danh-sach', 'hocsinhcontroller@index' )->name('layout.list_hocsinh');

	Route::get('them_hoc_sinh', 'hocsinhcontroller@create' )->name('layout.add_hocsinh');
	Route::post('them_hoc_sinh', 'hocsinhcontroller@store' )->name('layout.add_hocsinh');

	Route::get('sua_hoc_sinh/{id}', 'hocsinhcontroller@edit')->name('layout.update_hocsinh');
	Route::post('update', 'hocsinhcontroller@update');

	Route::get('xoa_hoc_sinh/{id}', 'hocsinhcontroller@delete')->name('layout.delete_hocsinh');
	Route::get('lang/{locale}',function($locale){
	session::put('locale',$locale);
	//return App::getlocale();
	return redirect()->back(); 

	// link sẽ add session của ngông ngữ khi người dùng ấn chọn thay đổi ngôn ngữ
});

});
Route::post('file', 'hocsinhcontroller@file' );
Route::post('file', 'hocsinhcontroller@upload' );
Route::get('export', 'hocsinhcontroller@export')->name('layout.add_hocsinh');
Route::post('import', 'hocsinhcontroller@doUpload')->name('layout.add_hocsinh');
// SEARCH CŨ
// Route::get('search', 'searchcontroller@getSearch');
// Route::post('tim', 'searchcontroller@getSearchAjax')->name('search');
// END SEARCH CŨ

// search  mới
Route::get('/','hocsinhcontroller@index');
Route::get('/search','hocsinhcontroller@search');
// endsearch mới
Route::get('asd', array('as' => 'dataAjax-country', 'uses' => 'CompaniesController@dataAjaxCountry'));

// end search mới
Route::get('/', 'printcontroller@getSearch@index');
Route::post('printview', 'printcontroller@printview');
Route::get('hienthi','datatablecontroller@getindex');
Route::get('anydata','datatablecontroller@anydata');




