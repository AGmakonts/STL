<?php
namespace AGmakonts\STL\Number;
use MabeEnum\Enum;

/**
 *
 * @author adamgrabek
 *
 */
final class ComparisonOperator extends Enum
{
    const EQUAL         = "0";
    const GREATER       = "1";
    const GREATER_EQUAL = "1|0";
    const SMALLER       = "-1";
    const SMALLER_EQUAL = "-1|0";
    
    /**
     * 
     * @return array
     */
    public function valueAsArray()
    {
    	return explode("|", $this->getValue());
    }
}
