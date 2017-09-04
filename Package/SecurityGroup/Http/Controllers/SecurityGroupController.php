<?php

namespace Package\SecurityGroup\Http\Controllers;

use Core\Pagination\ManualPagination;
use Core\Util\TreeProcessor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Package\SecurityGroup\Model\SecurityGroup;

class SecurityGroupController extends Controller
{
    /**
     * This method redirect us to views of BlogCategory
     */
    public function index(){
        $treeProcessor = new TreeProcessor();
        // Create a new object and get the tree data format
        $groups = SecurityGroup::getGroups();

        // Process the data
        $groupsData = $treeProcessor->getNonRecursiveData($groups);


        // Verify what is the state of categoriesData variable
        if(!empty($categoriesData[0])){
            // We convert the data to Collection
            $collection = $treeProcessor->getListObjectCollection($categoriesData);
            // Manual Pagination
            $paginate = new ManualPagination($collection, 6);

        }

        // Return the blogCategories object
        return view('Package.SecurityGroup.index',compact('paginate'));
    }
}
