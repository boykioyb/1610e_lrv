<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
	/**
	 * Get category listing view
	 * @author ThienTH
	 * @date 2017-05-10
	 * @return views
	 */
    public function index()
    {
    	$cates = Category::all();
    	return view('admin.category.index', compact('cates'));
    }
}
