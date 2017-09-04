<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 29/08/2017
 * Time: 18:09
 */

namespace Core\Util\Facade;


use Core\Util\TreeProcessor;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Package\BlogCategory\Model\BlogCategory;
use Package\SecurityGroup\Model\SecurityGroup;

class ConfigurationFacade
{
    public function __construct()
    {
    }

    /**
     * @param $object
     * @return Collection
     */
    public function getData($object): array
    {
        // Create a new TreeProcessor object
        $treeProcessor = new TreeProcessor();
        // Create a new object and get the tree data format
        $data = $object::getData();
        // Process the data
        $nonRecursiveData = $treeProcessor->getNonRecursiveData($data);
        // We get the Collection data
        $list = $treeProcessor->getListItemsCollection($nonRecursiveData);

        // We return the data
        return $list;
    }

    /**
     * @param string $option
     * @return View
     */
    public function categoriesRender(string $option): View
    {
        // We create a new blogcategory object
        $blogCategory = new BlogCategory();
        // We call to getData method
        $items = $this->getData($blogCategory);
        // Add a new item array
        array_unshift($items,['id'=>0,'name'=>'Main']);
        // Select the data to send
        $collection = (new Collection($items))->pluck('name', 'id');

        // We send to blogcategory select helper view
        return view('helper.select')->with(['items' => $collection, 'name' => $option]);
    }

    /**
     * @param string $option
     * @return View
     */

    public function groupsRender(string $option): View
    {
        // We create a new blogcategory object
        $securityGroups = new SecurityGroup();
        // We call to getData method
        $groups = $this->getData($securityGroups);
        // We send to multiple-groups-select select helper view
        return view('helper.multiple-groups-select')->with(['groups' => $groups, 'name' => $option]);
    }

    /**
     * @param string $name
     * @return View
     */

    public function visibilityRender(string $option): View
    {
        $items = [
            0 => 'Select options..',
            1 => 'Published',
            2 => 'Not Published'
        ];

        return view('helper.select')->with(['items' => $items, 'name' => $option]);
    }
}