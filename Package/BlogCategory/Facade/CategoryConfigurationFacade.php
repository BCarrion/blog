<?php 
namespace Package\BlogCategory\Facade;

use Package\BlogCategory\Model\BlogCategory;
use Package\SecurityGroup\Model\SecurityGroup;

/**
* 
*/
class CategoryConfigurationFacade
{
	
	public function render()
	{
		$settings = $this->getParams();
		// We obtain the data because we need passed it to View.
		return view('Helpers.Forms.category-settings.configuration', compact('settings'));
	}
	public function getParams()
	{
		$categories = BlogCategory::all();
		$groups = SecurityGroup::all();

		return array('categories'=>$categories ,'groups'=>$groups);
	}
}