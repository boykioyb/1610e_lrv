<?php 
use Illuminate\Http\Request;
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', function(){
		return view('layouts.admin');
	})->name('dashboard');

	Route::group(['prefix' => 'categories', 'middleware' => 'isModerator'], function(){
		
		Route::get('/', 'Admin\CategoryController@index')->name('cate.list');
		Route::get('remove/{id}', 'Admin\CategoryController@destroy')->name('cate.destroy');
		Route::get('add', 'Admin\CategoryController@addNew')->name('cate.add-new');
		Route::get('update/{id}', 'Admin\CategoryController@update')->name('cate.update');
		Route::post('save', 'Admin\CategoryController@save')->name('cate.save');
	});

	Route::group(['prefix' => 'posts'], function(){
		Route::get('/', 'Admin\PostController@index')->name('post.list');
		Route::get('/create', 'Admin\PostController@create')->name('post.create');
		Route::post('/save', 'Admin\PostController@save')->name('post.save');
		Route::get('remove/{id}', 'Admin\PostController@destroy')->name('post.destroy');
		Route::get('update/{id}', 'Admin\PostController@update')->name('post.update');
	});

	Route::post('generate-slug', function(Request $request){
		$slug = str_slug($request->input('title'), '-');
		$slug .= '-' . uniqid();
		return response()->json(['slug' => $slug]);
	})->name('generate.slug');

	// User management
	Route::group(['prefix' => 'user'], function(){
		Route::get('add-user', 'Admin\UserController@add')->name('user.add');
		Route::post('add-user', 'Admin\UserController@saveNewUser');
	});
});

 ?>

