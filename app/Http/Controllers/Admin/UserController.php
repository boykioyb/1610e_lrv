<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\User;
use Hash;
class UserController extends Controller
{
    public function add(){
    	return view('admin.user.add-form');
    }

    public function saveNewUser(AddUserRequest $request){
    	$model = new User();
    	$model->fill($request->all());
    	$model->password = Hash::make($model->password);
    	if ($request->hasFile('avatar')) {
    		$file = $request->file('avatar');
    		$filename = $file->hashName();
    		$model->avatar = $file->store('uploads');
		}
		$model->save();
		return redirect(route('dashboard'));
    }
}
