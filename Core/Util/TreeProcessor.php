<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 25/08/2017
 * Time: 16:12
 */

namespace Core\Util;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class TreeProcessor
{
    private $arrayCategories;

    /**
     * TreeProcessor constructor.
     */
    public function __construct()
    {
        $this->arrayCategories = [];
    }

    /**
     * @param array $data
     * @return array
     * @internal param string $lines
     */
    public function getNonRecursiveData(array $data): array
    {
        foreach ($data as $key => $datum) {
            if (!empty($datum)) {
                $this->arrayCategories[] = $this->extractingNonRecursiveData($datum);
            }
        }
        return $this->arrayCategories;
    }

    public function getRecursiveData(array $data, $lines = '')
    {
        foreach ($data as $key => $datum) {
            if (!empty($datum)) {
                $this->arrayCategories[] = $this->extractDataRecursively($datum, $lines, null);
            }
        }
        return $this->arrayCategories;
    }

    /**
     * ----------------------------------------------------------------------------
     * Extract all the nodes recursively
     *
     * @param array $nodes
     * @param $lines
     * @param array $vectors
     * @return array
     * @internal param $count
     * ----------------------------------------------------------------------------
     */
    public function extractDataRecursively(array $nodes, $lines, $vectors = array()): array
    {
        $line = "|—";
        foreach ($nodes as $key => $node) {
            $vectors[] = array('object' => $node->object, "lines" => $lines);
            // Verificamos si el nodo hijo no sea null
            if (!is_null($node->childNode)) {
                $line = $lines . $line;
                $vectors = $this->extractDataRecursively($node->childNode, $line, $vectors);
            }
        }
        return $vectors;
    }

    /**
     * -----------------------------------------------------
     * We can extract all the nodes and save
     * them to an array
     *
     * @param array $nodes
     * @return array
     * -----------------------------------------------------
     */
    public function extractingNonRecursiveData(array $nodes): array
    {

        $array_push = [];
        $line = "|—";
        array_push($array_push, $nodes);
        $vectors = [];
        while (!empty($array_push)) {
            $node = array_shift($array_push);
            foreach ($node as $key => $item) {
                if (!is_null($item->childNode)) {
                    $vectors[] = array('object' => $item->getObject(), "lines" => $line);
                    $line .= "|—";
                    foreach ($item->childNode as $childNode) {
                        array_unshift($array_push, [$childNode]);
                    }
                } else {
                    $vectors[] = array('object' => $item->getObject(), "lines" => $line);
                }
            }
        }
        return $vectors;
    }

    /**
     * -----------------------------------------------------------
     * Convert an array to Collection but the object within
     * the list
     *
     * @param array $categoriesData
     * @return Collection
     * -----------------------------------------------------------
     */
    public function getListObjectCollection(array $categoriesData): Collection
    {
        $categories = [];
        foreach ($categoriesData as $items) {
            foreach ($items as $item) {
                $categories[] = array('spaces' => $item['lines'], 'object' => $item['object']);
            }
        }
        return new Collection($categories);
    }

    /**
     * ------------------------------------------------
     * Convert an array to Collection
     *
     * @param array $categoriesData
     * @return Collection
     * -------------------------------------------------
     */
    public function getListItemsCollection(array $categoriesData): array
    {
        $categories = [];
        foreach ($categoriesData as $items) {
            foreach ($items as $item) {
                $categories[] = array('id' => $item['object']->id, 'name' => $item['lines'].$item['object']->name);
            }
        }
        return $categories;
    }
}