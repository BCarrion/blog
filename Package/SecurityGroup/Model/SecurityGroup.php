<?php

namespace Package\SecurityGroup\Model;

use Core\Util\TreeMap;
use Illuminate\Database\Eloquent\Model;
use Package\SecurityGroup\Traits\GroupHasRelationWith;

class SecurityGroup extends Model
{
    use GroupHasRelationWith;
    
    /**
	 * -------------------------------------------------------
	 * We set the SecurityGroup Model because we need to know 
	 * the field that we are going to assing in mass
	 * --------------------------------------------------------
	*/
    protected $fillable = ['name','parent_name'];

    /**
     * @return array
     */
    public static function getData():array
    {
        // this method return a Collection item
        $blogCategories = SecurityGroup::all();
        // Create a new object TreeMap
        $tree = new TreeMap();
        // We create a category parents array
        $category["parents"]  = array();

        foreach ($blogCategories as $value) {
            // we verify the root nodes
            if($value->parent_name == 0){
                // Add to parents the news parents
                array_push($category["parents"], $value);
            }
        }
        $tree->addParentNode($category["parents"],(object) new SecurityGroup());
        // Return tree
        return $tree->getTree();
    }
}
