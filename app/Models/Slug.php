<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Slug extends Model
{
    protected $table = 'slugs';
    public $timestamps = false;

    public static function saveSlug($entityType, $entityId, $slug){
    	$slugObject = Slug::where('entity_type' , $entityType)
                            ->where('entity_id', $entityId)->first();
        try{
        	if(!$slugObject){
	            DB::table('slugs')->insert([
	                    'entity_type' => $entityType,
	                    'entity_id' => $entityId,
	                    'slug' => $slug
	                ]);
	        }else{
	            DB::table('slugs')
	                ->where('entity_type', $entityType)
	                ->where('entity_id', $entityId)
	                ->update(['slug' => $slug]);
	        }

	        return true;
        }catch(\Exception $ex){
        	\Log::error($ex->getMessage());
        	return false;
        }
        
    }
}
