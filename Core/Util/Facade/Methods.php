<?php
/**
 * Created by PhpStorm.
 * User: Edgar Andrey Vega Pa
 * Date: 31/08/2017
 * Time: 13:52
 */

namespace Core\Util;


class Methods
{

    /**
     * @param $op1
     * @param $op2
     * @return string
     */

    public function selected($op1, $op2):string
    {

        $status = false;

        if (!is_null($op1) || !is_null($op2))
            $status = $this->compare($op1, $op2);

        return $status ? 'selected' : '';
    }

    /**
     * @param $option1
     * @param $option2
     * @return bool
     */
    public function compare($option1, $option2)
    {
        $status = false;
        if ($option1 == $option2) {
            $status = true;
        }
        return $status;
    }
}