<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 31/08/2017
 * Time: 15:54
 */

namespace Core\Pagination;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ManualPagination
{
    private $configuration;

    /**
     * @return LengthAwarePaginator
     */
    public function __construct(Collection $items, $perPage = 12)
    {
        $this->configuration = new Configuration($items, $perPage);
        $this->paginate();

    }

    public function paginate()
    {

        /**
         * configuration
         */
        $CurrentPageSearchResults = $this->configuration->getCurrentPageSearchResults();
        $countItems = $this->configuration->getCountItems();
        $perPage = $this->configuration->getPerPage();
        $currentPage = $this->configuration->getCurrentPage();
        $resolveCurrentPath = $this->configuration->getCurrentPath();
        //Create our paginator and pass it to the view
        return new LengthAwarePaginator($CurrentPageSearchResults, $countItems, $perPage, $currentPage, ['path' => $resolveCurrentPath]);
    }

}