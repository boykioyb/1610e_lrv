<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public function parentName()
    {
        $parent = Category::find($this->cate_id);
        if($parent){
    		return $parent->name;
        }
        return null;
    }
}
