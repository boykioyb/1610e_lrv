<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Category;
class HomeController extends Controller
{
	/**
	 * Homepage action
	 * @return view
	 */
    public function index(){
    	
    	return view('client.homepage');
    }
}
