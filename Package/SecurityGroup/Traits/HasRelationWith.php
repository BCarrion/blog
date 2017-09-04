<?php 
namespace Package\SecurityGroup\Traits;

/**
 * --------------------------------------
* This is a Trait allows to know what is 
* the relation with other clases
* ---------------------------------------
*/
trait HasRelationWith 
{
	public function blogCategories(){
		return $this->belongsToMany('Package\BlogCategory\Model\BlogCategory','blog_category_group',['g_name','g_p_name'], ['c_name','c_p_name']);
	}
}
