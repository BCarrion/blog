<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 31/08/2017
 * Time: 15:31
 */

namespace Core\Pagination;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Configuration
{
    private $items;
    private $perPage;
    private $countItems;
    private $currentPage;
    private $currentPath;


    /**
     * Configuration constructor.
     * @param Collection $items
     * @param $perPage
     */
    public function __construct(Collection $items, $perPage)
    {
        $this->items = $items;
        $this->perPage = $perPage;
        $this->currentPage = LengthAwarePaginator::resolveCurrentPage();
        $this->currentPath = LengthAwarePaginator::resolveCurrentPath();
        $this->countItems = count($items);
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    /**
     * @param Collection $items
     */
    public function setItems(Collection $items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    /**
     * @param mixed $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param $currentPage
     */
    public function setResolveCurrentPath($currentPage)
    {
        $this->currentPage = $currentPage;
    }



    public function getCurrentPageSearchResults()
    {
        return $this->items->slice(($this->currentPage - 1) * $this->perPage, $this->perPage)->all();
    }

    /**
     * @return mixed
     */
    public function getCountItems()
    {
        return $this->countItems;
    }

    /**
     * @param mixed $countItems
     */
    public function setCountItems($countItems)
    {
        $this->countItems = $countItems;
    }

    /**
     * @return string
     */
    public function getCurrentPath(): string
    {
        return $this->currentPath;
    }

    /**
     * @param string $currentPath
     */
    public function setCurrentPath(string $currentPath)
    {
        $this->currentPath = $currentPath;
    }





}