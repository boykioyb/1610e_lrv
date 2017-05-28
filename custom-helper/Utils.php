<?php 
if(!function_exists('prettyUrl')){
	function prettyUrl($str){
		return $str;
	}
}

function get_options($array, $parent=0, $indent="", $forget = null) {
    $return = array();
    for ($i=0; $i < count($array); $i++) { 
    	$val = $array[$i];

      	if($val->parent_id == $parent) {
      		if($val->id == $forget){
	    		continue;
	    	}
        	$return["x".$val->id] = $indent.$val->name;
        	$return = array_merge($return, get_options($array, $val->id, $indent."--"));
      	}
    }
    return $return;
}

 ?>