<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 04/10/14
 * Time: 21:52
 */

namespace AGmakonts\STL\DateTime\Exception;


use Exception;

class InvalidMonthException extends \InvalidArgumentException
{
    public function _construct($month)
    {
        $this->message = sprintf("Number '%s' is not valid month", $month);
    }

} 