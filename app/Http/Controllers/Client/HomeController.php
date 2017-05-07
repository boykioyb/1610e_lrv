<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
class HomeController extends Controller
{
	/**
	 * Homepage action
	 * @return view
	 */
    public function index(){
    	// $roles = Role::all();
    	// $user = "Đặng Văn Đô!!!!";
    	// dd($roles);
    	return view('client.homepage');
    }
}
