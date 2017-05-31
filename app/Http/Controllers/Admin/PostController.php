<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
class PostController extends Controller
{
    public function index(Request $request){
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
        if(!$request->has('keyword') && !$request->has('cate')){

            $posts = Post::all();
        }else{
            if($request->has('keyword')){
                $keyword = $request->input('keyword');
                $query = Post::where('title', 'like', "%$keyword%");
            }

            if($request->has('cate')){
                $cateId = $request->input('cate');
                if(!isset($query)){
                    $query = Post::where('cate_id', $cateId);
                }else{
                    $query->where('cate_id', $cateId);
                }
            }
            
            $posts = $query->get();

        }

        $searchCateId = $request->input('cate');
        $searchKeyword = $request->input('keyword');
        return view('admin.posts.index', compact('cates', 'posts', 'searchCateId', 'searchKeyword'));
    }
}
