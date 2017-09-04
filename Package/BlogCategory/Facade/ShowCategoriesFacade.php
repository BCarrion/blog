<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 25/08/2017
 * Time: 16:12
 */

namespace Package\BlogCategory\Facade;

use Package\BlogCategory\Model\BlogCategory;

class ShowCategoriesFacade
{
    public function render()
    {
        $categories = (new BlogCategory())->getCategories();
        foreach ($categories as $category) {
            $this->getData($category,"");
        }

    }

    public function getData(array $nodes,$lines)
    {
        $lineas='';
        foreach ($nodes as $key => $node) {
            echo "<table>".view('Package.BlogCategory.partials-index.prueba', compact(['node','lines']))."</table>";
            // Verificamos si el nodo hijo no sea null
            if(!is_null($node->childNode)){
                $lineas=$lines."&ensp; &ensp;";
                $this->getData($node->childNode,$lineas);
            }

        }
    }
}