<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('client.homepage');
})->name('homepage');

Route::get('login', function($msg = null){
	return view('admin.auth.login');
})->name('login');

Route::post('login', 'Auth\LoginController@postLogin')->name('login.post');

Route::get('logout', function(){
	\Auth::logout();
	return redirect(route('login'));
})->name('logout');

Route::get('not-found', function(){
	return view('not-found');
})->name('error.404');



