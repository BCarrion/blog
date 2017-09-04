<?php

namespace Package\BlogCategory\Http\Controllers;

use Core\Pagination\ManualPagination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Core\Util\TreeProcessor;
use Package\BlogCategory\Model\BlogCategory;
use Package\BlogCategory\Http\Requests\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Obtain all the list parents by child
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        // Create a new TreeProcessor object
        $treeProcessor = new TreeProcessor();
        // Create a new object and get the tree data format
        $categories = BlogCategory::getData();
        // Manual pagination

        // Process the data
        $categoriesData = $treeProcessor->getNonRecursiveData($categories);


        // Verify what is the state of categoriesData variable
        if(!empty($categoriesData[0])){
            // We convert the data to Collection
            $treeCollection = $treeProcessor->getListObjectCollection($categoriesData);
            // We paginate the data
            $paginate = new ManualPagination($treeCollection,6);
        }


       // Return the blogCategories object
       return view('Package.BlogCategory.index',compact('paginate'));
    }


    /**
     * [create description]
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View [type] [description]
     */
    public function create()
    {      
    	return view('Package.BlogCategory.Forms.Create.create');
    }

    /**
     * [store description]
     * @param Request|BlogCategoryRequest $request [description]
     */
    public function store(BlogCategoryRequest $request)
    {
      dd($request->all());
    }


}
