<?php 
namespace Package\BlogCategory\Traits;


/**
* 
*/
trait HasRelationWith 
{
	public function groups(){
		return $this->belongsToMany('Package\SecurityGroup\Model\SecurityGroup');
	}
}
