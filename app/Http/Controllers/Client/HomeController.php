<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Category;
use App\Models\Slug;
use App\Models\Post;
class HomeController extends Controller
{
	/**
	 * Homepage action
	 * @return view
	 */
    public function index(){
    	
    	return view('client.homepage');
    }

    public function getView($slug){
        $object = Slug::where('slug', $slug)->first();
        if($object == null){
            return view('not-found');
        }

        switch ($object->entity_type) {
            case ENTITY_CATEGORY:
                // Call function that execute logic for get list post of this category
                $listPost = Post::where('cate_id', $object->entity_id)->get();
                $cate = Category::find($object->entity_id);

                return view('client.list-post', compact('cate', 'listPost'));
            case ENTITY_POST:
                // Call function that execute logic for get content of this
                break;
            
            default:
                return view('not-found');
                break;
        }

    }
}
