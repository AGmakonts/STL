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
    const EQUAL         = '=';
    const GREATER       = '>';
    const GREATER_EQUAL = '>=';
    const SMALLER       = '<';
    const SMALLER_EQUAL = '<=';
}
