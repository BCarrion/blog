<?php

namespace Core\Util;

/**
 *
 */
class Node
{
    private $object;
    public $childNode;

    public function __construct($element)
    {
        $this->object = $element;
        $this->childNode = null;
    }
    /**
     * Add a new child to root node
     * @param Node $childNode
     */
    public function addChild(Node $childNode)
    {
        $this->childNode[] = $childNode;
    }


    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

}