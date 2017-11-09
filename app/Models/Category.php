<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'parent_id'];

    public static $entity_type = ENTITY_CATEGORY;

    // Get parent name of current object
    public function parentName()
    {
        $parent = Category::find($this->parent_id);
        if($parent){
    		return $parent->name;
        }
        return null;
    }

    /**
     * Get category url by entity id and entity type
     * @author ThienTH
     * @param none
     * @return string
     * @date 2017-06-28 - create
     * @date 2017-07-15 - Viet Anh - update logic at line 35
     */
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
