<?php 
namespace Package\SecurityGroup\Traits;

/**
 * --------------------------------------
* This is a Trait allows to know what is 
* the relation with other clases
* ---------------------------------------
*/
trait GroupHasRelationWith
{
	public function categories(){
		return $this->belongsToMany('\Package\BlogCategory\Model\BlogCategory','blog_category_group','group_id','category_id')->withTimestamps();
	}
}
