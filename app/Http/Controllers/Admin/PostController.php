<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
    	// 1. Get all cates
    	$cates = Category::all();

        // 2. Get list name
        $nameList = get_options($cates);
        
        for ($i = 0; $i < count($cates); $i++) {
            foreach ($nameList as $key => $value) {
                if("x".$cates[$i]->id == $key){
                    $cates[$i]->name = $value;
                }
            }
        }

        $posts = Post::all();

        return view('admin.posts.index', compact('cates', 'posts'));
    }
}
