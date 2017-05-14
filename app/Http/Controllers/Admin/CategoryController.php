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

	/**
	 * Delete category by id
	 * @author ThienTH
	 * @date 2017-05-14
	 * @return redirect
	 */
    public function destroy($id)
    {
    	// 1. Check category id is existed or not
    	$cate = Category::find($id);
    	if($cate != null){
    		// 2. Delete record from database
    		$cate->delete();
    		// $cate->Category::find($id)->destroy();
    	}

    	// 3. Redirect page to category list
    	return redirect(route('cate.list'));
    }

	/**
	 * Generate category form
	 * @author ThienTH
	 * @date 2017-05-14
	 * @return view - form
	 */
    public function addNew()
    {
    	// 1. Create new model
    	$model = new Category();
    	
    	// 2. Get all category to set parent id of new category
    	$cates = Category::all();

    	// 3. Generate view form
    	return view('admin.category.form', compact('model', 'cates'));
    }
}
