<?php 

Route::get('/', function(){
	return view('layouts.admin');
})->name('dashboard');

Route::group(['prefix' => 'categories'], function(){
	
	Route::get('/', 'Admin\CategoryController@index')->name('cate.list');
});
 ?>

