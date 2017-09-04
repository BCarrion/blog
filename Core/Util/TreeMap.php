<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 25/08/2017
 * Time: 15:46
 */

namespace Core\Util;


use Illuminate\Support\Collection;

/**
 * -----------------------------------------------------
 * Class TreeMap, this class constructs a new tree map
 * using the natural ordering of its keys
 *
 * @package Core\Util
 * -----------------------------------------------------
 */
class TreeMap
{
    private $treeMap;
    private $tree;

    /**
     * TreeMap constructor.
     */
    public function __construct()
    {
        $this->tree = [];
    }

    /**
     * ------------------------------------------------------------
     * Add a new parentNode
     *
     * @param array $listParentNodes
     * @param $object
     * ------------------------------------------------------------
     */
    public function addParentNode(array $listParentNodes, $object)
    {
        // We generate a loop for know which items are nodes.
        foreach ($listParentNodes as $index => $rootNode) {
            // We create a new parent node
            $parentNode = new Node($rootNode);
            // We make the tree
            $this->makeMap($parentNode, $object);
            // Save the data
            $this->tree[] = $this->getTreeMap();
        }
    }

    /**
     * -----------------------------------------------------
     * In this method, we search all the child
     * by parentNode
     *
     * @param Node $parentNode
     * @param $object*
     * ------------------------------------------------------
     */

    public function makeMap(Node $parentNode, $object)
    {
        if (is_object($object)) {
            // Search which child exist by parentNode
            $children = $this->getAllowsChildren($parentNode, $object);
            // We count the number of elements
            $childCount = $this->getChildCount($children);
            // ¿the parentNode has children?
            if ($this->hasChild($childCount)) {
                // We generate a loop for each item found
                foreach ($children as $key => $value) {
                    // We create a new node
                    $childNode = new Node($value);
                    // Attach a child node to parent node
                    $parentNode->addChild($childNode);
                    // We make  recursion to find new children item.
                    $this->makeMap($childNode, $object);
                }
            }
            // Save the child by parentNode
            $this->setTreeMap($parentNode);
        }
    }


    /**
     * ---------------------------------------------------------
     * @param Node $parentNode
     * @param $object
     * @return mixed
     * ---------------------------------------------------------
     */
    public function getAllowsChildren(Node $parentNode, $object): Collection
    {
        $child = $object::where('parent_name', $parentNode->getObject()->id)->get();
        // Return the collection child
        return $child;
    }

    /**
     * -----------------------------------
     * Count the number of children
     * and returns them
     *
     * @param $child
     * @return int
     * -----------------------------------
     */
    public function getChildCount($child): int
    {
        $childCount = count($child);
        // Return the number of items
        return $childCount;
    }

    /**
     * --------------------------------------
     * verify if the parent has children
     *
     * @param int $childCount
     * @return bool
     * --------------------------------------
     */
    public function hasChild(int $childCount): bool
    {
        $hasChild = false;
        if ($childCount > 0) {
            $hasChild = true;
        }
        // Return true if the parent has children
        return $hasChild;
    }

    /**
     * @param $treeMap
     */
    public function setTreeMap($treeMap)
    {
        $this->treeMap = [];
        $this->treeMap[] = $treeMap;
    }

    /**
     * @return array
     */
    public function getTreeMap(): array
    {
        return $this->treeMap;
    }

    /**
     * @return array
     */
    public function getTree(): array
    {
        return $this->tree;
    }


}