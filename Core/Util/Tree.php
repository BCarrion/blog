<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 25/08/2017
 * Time: 15:46
 */

namespace Core\Util;

use Package\BlogCategory\Model\BlogCategory;

class Tree
{
    /**
     * @param array $rootParents
     * @return array
     */
    public function createRootNode(array $rootParents)
    {
        $data = [];
        // Key hace referencia a el indice
        foreach ($rootParents as $index => $rootNode) {
            // We create a new root node
            $root = new Node($rootNode);
            // Search and save a new child
            $data[] = $this->searchChild($root);
        }
        // Return the data
        return $data;
    }

    public function searchChild(Node $root)
    {
        // We search childs n$root->getOject()->idodes
        $child = BlogCategory::where('parent_name', $root->getOject()->id)->get();
        // We created a temporal array to save all the tree.
        $temporal = [];
        // Verify if the root has childs
        if (count($child) > 0) {

            foreach ($child as $key => $value) {
                // We create a new node
                $child = new Node($value);
                // Attach a new node a root node
                $root->addChildNode($child);
                // We do recursion to find new childs
                $this->searchChild($child);
            }
        }
        // Save the trees data
        $temporal[] = $root;
        // Returns data
        return $temporal;
    }
}