<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'short_description', 'content', 'cate_id'];
    public static $entity_type = ENTITY_POST;

    public function parentName()
    {
        $parent = Category::find($this->cate_id);
        if($parent){
    		return $parent->name;
        }
        return null;
    }
    
    public function getUrl(){
        $slug = Slug::where('entity_type', self::$entity_type)
                        ->where('entity_id', $this->id)->first();
        if($slug){
            return url($slug->slug);
        }else{
            return url('/');
        }
    }
}
