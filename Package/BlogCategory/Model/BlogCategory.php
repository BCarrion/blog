<?php

namespace Package\BlogCategory\Model;

use Illuminate\Database\Eloquent\Model;
use Package\BlogCategory\Traits\BlogCategoryHasRelationWith;
use Core\Util\TreeMap;

class BlogCategory extends Model
{
	use BlogCategoryHasRelationWith;


    /**
	 * -------------------------------------------------------
	 * We set the BlogCategory Model because we need to know 
	 * the field that we are going to assing in mass
	 * --------------------------------------------------------
	 */
    protected $fillable=['name', 'description','visibility','parent_name','groups'];

    /**
     * @return array
     */
    public static function getData():array
    {
        // this method return a Collection item
        $blogCategories = BlogCategory::all();
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
        $tree->addParentNode($category["parents"],(object) new BlogCategory());
        return $tree->getTree();
    }
}
