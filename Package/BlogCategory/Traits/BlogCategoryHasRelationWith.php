<?php 
namespace Package\BlogCategory\Traits;


/**
* 
*/
trait BlogCategoryHasRelationWith
{
	public function groups(){
		return $this->belongsToMany('Package\SecurityGroup\Model\SecurityGroup','blog_category_group','category_id','group_id');
	}
}
