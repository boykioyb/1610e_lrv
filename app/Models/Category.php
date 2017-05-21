<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'parent_id'];

    // Get parent name of current object
    public function parentName()
    {
        $parent = Category::find($this->parent_id);
        if($parent){
    		return $parent->name;
        }
        return null;
    }
}
